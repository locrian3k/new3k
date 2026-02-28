// file_rotate.c
// This file parses a text file, selects two consecutive lines from it
// and writes those two lines to a different file.
// The process occurs every 50 seconds.

// Written March 4, 2000 by Nanook

#include <security.h>
inherit ACCESS;

#define PATH        "/html/ga/images/ads/"
#define SOURCE		"urls.txt"
#define DESTINATION	"ads.txt"

#define DEBUG 0

void BROADCAST(string x) {
	if( !find_player( "nanook" ) || !DEBUG ) return;
	tell_object( find_player( "nanook" ), sprintf( "%-=72s\n", x ) );
}


void main() { 

	string *source;
	int len, i;
	
return;

	source = unguarded( "html", #'grab_file, ({ PATH+SOURCE }) );
	
	len = sizeof( source );
	BROADCAST( "Length is: "+len );
	len /= 2;
	
	i = random( len );
	i *= 2;
	BROADCAST( "Selected url is: "+i );
	
	unguarded( "html", #'rm, ({ PATH+DESTINATION }) );
	
	unguarded("html", #'write_file, ({ PATH+DESTINATION, 
		sprintf( "%s\n%s\n", source[i], source[i+1] ) }) );
	
	BROADCAST( "Output was:\n" + sprintf( "%s\n%s\n", source[i], source[i+1] 
) );
	
	call_out( "main", 50);
	}

void create() { main(); }

