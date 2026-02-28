#pragma strict_types
#include <security.h>
#include "/players/clan/clan_obj/path.h"
inherit ACCESS;
inherit "/obj/object";
#define TEMPLATE ("/html/clan/clan_template.txt")
#define PAGE ("/html/clan/clanworld2.html")

varargs void update_page(status clean, status offwar);
void update_war_check(string info, status results);

string current_war_info;
status war_happening, has_results, changed;

void create()
{
  ::create();
    changed = 0;
    VOTED->war_check(1);
    war_happening = has_results = 0;
    update_page(0);
}

varargs void update_page(status clean, status offwar)
{
  string template;
  template = unguarded(2, #'read_file, ({TEMPLATE}));
  
  if(offwar && war_happening)
    return;
  
  if(clean)
  {
    current_war_info = 0;
    changed = 1;
  }
  else if(current_war_info)
  {
    template = subs(template, 
     "<!-- Clanworld Daemon Information -->", current_war_info);
    if(war_happening)
      call_out("update_page", 60, 0);
    else
    {
      call_out("update_page", 600, 0, 1);
    }
  }
  
  if(changed)
  {
    unguarded(2, #'rm, ({PAGE}));
    unguarded(2, #'write_file, ({PAGE, template}));
    changed = 0;
  }
}

void check_war_info()
{
  if(war_happening && !has_results)
  {
    VOTED->XXX();
    VOTED->war_check(1);
    call_out("check_war_info", 58);
  }
  else if(war_happening)
  {
    WARD->XXX();
    update_war_check((string)WARD->query_war_status_text(), 1);
    call_out("check_war_info", 58);
  }
}

void countdown_started(int time)
{
  war_happening = 1;
  check_war_info();
  update_page(0);
}

void update_war_check(string info, status results)
{
  if(!results || has_results)
  {
    current_war_info = subs(info, "\n", "<br>\n");
    changed = 1;
  }
  else
  {
    has_results = 1;
    current_war_info = subs((string)WARD->query_war_status_text(), "\n", "<br>\n");
    changed = 1;
  }
}

void war_finished(string info)
{
  current_war_info = subs(info, "\n", "<br>\n");
  war_happening = 0;
  has_results = 0;
  changed = 1;
}

void abort_war()
{
  update_page(1);
  war_happening = 0;
}
