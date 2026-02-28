
  

// who_list.c
// writes html file for current mud who list
// automatically updates every 5 minutes
// 01-05-98 : nanook @ 3k 
//
// 08-03-99 : updated to show uptime by nanook @ 3k.

#include <security.h>
inherit ACCESS;

#define TIMECLOCK "/obj/timeclock"
#define SHUTDOWN  "/obj/shut"

mapping FOLK;
string out;

void string_list(object dude) {
  string temp, name, url, title, alignment, dispname, pretitle;
  int level, startbs, endbs, totbs;
  if(!dude || dude->query_invis()) return;
  
  name = (string)dude->query_real_name();
  if(lower_case(name) == "logon") return;
  if(lower_case(name[0..4])=="guest") return;
  
  url = (string)dude->query_webpage();
  alignment = (string)dude->query_al_title();
  if(!alignment) alignment = "";
//  alignment = regreplace(alignment, "[^A-Za-z0-1\s*]", "",1);
  pretitle = (string)dude->query_pretitle();
  if (!pretitle) pretitle = "";
  title = (string)dude->query_title();
  if(!title) title = "";
  startbs = strstr(title, "\b");
  endbs = strrstr(title, "\b");
  totbs = endbs - startbs;
  title = regreplace(title, "\b", "", 1);
  if(totbs > 0) { name = name[0..(strlen(name)-totbs-1)] + title; title = ""; }
//  title = regreplace(title, "[^A-Za-z0-1\s*]", "", 1);
  level = (int)dude->query_level();
  if (level > 49) {
     level = level * 10;
  } else {
     level = level + (int)dude->query_extra_level();
  }
  
   if (alignment != "") {
    dispname = pretitle + " " + capitalize(name) + " " + title + " ("+ alignment+")";
   } else {
      dispname = pretitle + " " + capitalize(name) + " " + title;
   }
  if(url && (strlen(url)<4 || url[0..3]!="http")) url="http://"+url;

  if(url) temp = sprintf("<a href=%s target=_top>%s</a><br />",url,dispname);
  else temp = dispname + "<br />";

  if(!member(FOLK,level)) FOLK += ([ level : temp ]);
  else FOLK[level]+=" "+temp;

  }

void make_table(string a) {
  if(!a) return;
  out += "<tr><td align=center>\n"
         "<span style=\"font-weight:bold;\">["+a+"]</span></td>\n" 
         "<td>&nbsp;&nbsp;&nbsp;</td><td>"+FOLK[a]+"</td></tr><tr><td>&nbsp;</td></tr>\n";
  }
             

void main() { 
  object *dudes;
  string *order;

  FOLK = ([]);
  dudes = users_sorted();

  filter(dudes,#'string_list);

  order = m_indices(FOLK);
  order = sort_array(order,#'<);

  out = unguarded("html", #'read_file, ({ "/html/bin/head2.html" }));

  out += "<br><br>\n";
  out += "<div style=\"font-size: 2pt;\">";

  out += sprintf("<b>Uptime is: %s<br>Reboot in: %s</b><br><br>\n",
    ( find_object(TIMECLOCK) ? TIMECLOCK->query_uptime() : "Unknown" ),
    ( find_object(SHUTDOWN) ? SHUTDOWN->query_real_time_left() : "Unknown") );

  out += sprintf("<B>%d Users Currently on 3 Kingdoms (%s EST)</B></CENTER>\n"
    "<hr><br>\n",sizeof(dudes),ctime(time()));
  
  out += "<table border = 0>\n";
  
  filter(order,#'make_table);
  
  out += "</table>\n";
  out += "<br><br>This list is updated every 5 minutes.\n";
  out += "</td></tr>\n"
         "</table>\n"
         "</div>\n"
         "</BODY>\n"
         "</HTML>\n";
         
   unguarded("html", #'rm, ({ "/html/wholist/who_list2.html" }));
   unguarded("html", #'write_file, ({ "/html/wholist/who_list2.html", out }));
  
  call_out("main",60);
  }
  
void create() { main(); }

