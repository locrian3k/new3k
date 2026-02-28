// writes inc file for current uptime/reboot
// to /html/whollist/uptime.inc
// for the webpage, please do not edit or remove
// automatically updates every 1 minute
// -Vryce 4/5/03

#include <security.h>
inherit ACCESS;

#define SHUTDOWN  "/obj/shut"

string out;

void main() { 

    out = "";
    out += sprintf("<? $uptime=\"%s\"; \n $reboot=\"%s\"; ?>\n",
      ( find_object(SHUTDOWN) ? SHUTDOWN->query_ctu() : "Unknown" ),
      ( find_object(SHUTDOWN) ? SHUTDOWN->query_ctl() : "Unknown") );

    unguarded("html", #'rm, ({ "/html/wholist/uptime.inc" }));
    unguarded("html", #'write_file, ({ "/html/wholist/uptime.inc", out }));

    call_out("main",60);
}

void create() { main(); }

