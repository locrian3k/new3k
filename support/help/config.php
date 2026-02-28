<?php
/**
 * Help Files Configuration
 *
 * This file controls how help files are loaded and displayed.
 * Modify these settings when deploying to the production server.
 */

return [
    // ===========================================
    // DISPLAY MODE
    // ===========================================
    // 'modal' - Opens help content in a popup modal (recommended)
    // 'link'  - Links directly to external URLs (legacy mode)
    'display_mode' => 'modal',

    // ===========================================
    // HELP FILE SOURCE CONFIGURATION
    // ===========================================
    // 'static'  - Use only the predefined categories below
    // 'hybrid'  - Use static categories + scan helpdocs for uncategorized files
    'source' => 'hybrid',

    // ===========================================
    // HELPDOCS FILE (MUD-generated help content)
    // ===========================================
    // Single file exported by the MUD containing all command help text.
    // This is the primary source for help content (commands, high-mortal, etc.)
    // Path is relative to the site root via DOCUMENT_ROOT.
    'helpdocs_file' => dirname(__DIR__, 2) . '/data/help/helpdocs',

    // ===========================================
    // EXTERNAL URL SETTINGS
    // (Only used when display_mode is 'link' for legacy direct-linking)
    // ===========================================

    // Base URL for fetching/linking to help files
    'external_url' => 'https://3k.org/help/',

    // URL suffix (file extension for external links)
    'url_suffix' => '.php',

    // ===========================================
    // LEGACY LINK MODE SETTINGS
    // (Only used when display_mode is 'link')
    // ===========================================

    // Open links in new window?
    'open_in_new_window' => true,

    // ===========================================
    // STATIC HELP FILE CATEGORIES
    // ===========================================
    //
    // These categories organize the help files for display.
    // The organization here is INDEPENDENT of how files are stored on the server.
    //
    // When 'source' is 'static' or 'hybrid', this list determines what's shown.
    // When 'source' is 'directory', these categories are ignored and all files
    // from the directory are shown in a single list.
    //
    // Format:
    // 'category_id' => [
    //     'title' => 'Display Title',
    //     'icon' => 'fa-solid fa-icon-name',
    //     'description' => 'Brief description',
    //     'files' => [
    //         'filename' => 'display_name',  // filename = what to fetch, display_name = what user sees
    //         ...
    //     ]
    // ]
    //
    // IMPORTANT: The 'filename' key is what gets sent to the server.
    // It should match the actual help file name (case-sensitive).

    'categories' => [
        // ===========================================
        // IMPORTANT - Essential info for all players
        // ===========================================
        'important' => [
            'title' => 'Important',
            'icon' => 'fa-solid fa-star',
            'description' => 'Essential information for all players',
            'files' => [
                'showaddr' => 'showaddr',
                'webpage' => 'webpage'
            ]
        ],

        // ===========================================
        // COMMUNICATION - Player interaction
        // ===========================================
        'communication' => [
            'title' => 'Communication',
            'icon' => 'fa-solid fa-comments',
            'description' => 'How to interact with other players',
            'files' => [
                'addlink' => 'addlink',
                'addwho' => 'addwho',
                'ansiwho' => 'ansiwho',
                'checklink' => 'checklink',
                'checkwho' => 'checkwho',
                'converse' => 'converse',
                'dislink' => 'dislink',
                'diswho' => 'diswho',
                'emote' => 'emote',
                'finger' => 'finger',
                'gossip' => 'gossip',
                'gossipblock' => 'gossipblock',
                'gossiphist' => 'gossiphist',
                'gossipwho' => 'gossipwho',
                'ignorelink' => 'ignorelink',
                'mail' => 'mail',
                'mysoul' => 'mysoul',
                'mywho' => 'mywho',
                'mywho2' => 'mywho2',
                'mywhosync' => 'mywhosync',
                'notify' => 'notify',
                'party' => 'party',
                'reply' => 'reply',
                'say' => 'say',
                'sayhist' => 'sayhist',
                'shout' => 'shout',
                'shoutblock' => 'shoutblock',
                'shouthist' => 'shouthist',
                'soulhist' => 'soulhist',
                'soulnew' => 'soulnew',
                'talk' => 'talk',
                'talke' => 'talke',
                'tell' => 'tell',
                'tellb' => 'tellb',
                'tellhist' => 'tellhist',
                'watch' => 'watch',
                'whisper' => 'whisper'
            ]
        ],

        // ===========================================
        // COMBAT - Battle commands and equipment
        // ===========================================
        'combat' => [
            'title' => 'Combat',
            'icon' => 'fa-solid fa-crosshairs',
            'description' => 'Battle commands and equipment',
            'files' => [
                'akills' => 'akills',
                'autohp' => 'autohp',
                'cbrief' => 'cbrief',
                'eq' => 'eq',
                'evasion' => 'evasion',
                'forcehp' => 'forcehp',
                'ibrief' => 'ibrief',
                'kill' => 'kill',
                'killed' => 'killed',
                'kills' => 'kills',
                'stop' => 'stop',
                'wimpy' => 'wimpy',
                'wimpydir' => 'wimpydir'
            ]
        ],

        // ===========================================
        // ANSI - Color and display settings
        // ===========================================
        'ansi' => [
            'title' => 'Ansi & Colors',
            'icon' => 'fa-solid fa-palette',
            'description' => 'Color and display customization',
            'files' => [
                'acopy' => 'acopy',
                'ansi' => 'ansi',
                'ansiwho' => 'ansiwho',
                'aset' => 'aset',
                'modcopy' => 'modcopy',
                'mudansi' => 'mudansi',
                'setcolor' => 'setcolor'
            ]
        ],

        // ===========================================
        // COMMANDS - Common mortal commands
        // ===========================================
        'commands' => [
            'title' => 'Commands',
            'icon' => 'fa-solid fa-terminal',
            'description' => 'Common player commands',
            'files' => [
                'acronyms' => 'acronyms',
                'advance' => 'advance',
                'afind' => 'afind',
                'afk' => 'afk',
                'age' => 'age',
                'aread' => 'aread',
                'arealist' => 'arealist',
                'ask' => 'ask',
                'auction' => 'auction',
                'autokeep' => 'autokeep',
                'awho' => 'awho',
                'balive' => 'balive',
                'biff' => 'biff',
                'brief' => 'brief',
                'bug' => 'bug',
                'bugfree' => 'bugfree',
                'busy' => 'busy',
                'butcher' => 'butcher',
                'cache' => 'cache',
                'cal' => 'cal',
                'calendar' => 'calendar',
                'cassist' => 'cassist',
                'cbug' => 'cbug',
                'chatlines' => 'chatlines',
                'cheatwho' => 'cheatwho',
                'checkway' => 'checkway',
                'chit' => 'chit',
                'coins' => 'coins',
                'commands' => 'commands',
                'consider' => 'consider',
                'considerx' => 'considerx',
                'counterpoise' => 'counterpoise',
                'csubmit' => 'csubmit',
                'deathhist' => 'deathhist',
                'describe' => 'describe',
                'dispose' => 'dispose',
                'dmap' => 'dmap',
                'down' => 'down',
                'drop' => 'drop',
                'earmuffs' => 'earmuffs',
                'east' => 'east',
                'elight' => 'elight',
                'eport' => 'eport',
                'esearch' => 'esearch',
                'exa' => 'exa',
                'examine' => 'examine',
                'exits' => 'exits',
                'explorer' => 'explorer',
                'fbchat' => 'fbchat',
                'flee' => 'flee',
                'follow' => 'follow',
                'followers' => 'followers',
                'following' => 'following',
                'gam' => 'gam',
                'gearup' => 'gearup',
                'get' => 'get',
                'gguild' => 'gguild',
                'give' => 'give',
                'gladtalk' => 'gladtalk',
                'glance' => 'glance',
                'gshout' => 'gshout',
                'hardcore' => 'hardcore',
                'help' => 'help',
                'hmonitor' => 'hmonitor',
                'hp' => 'hp',
                'hwho' => 'hwho',
                'i' => 'i',
                'idea' => 'idea',
                'ii' => 'ii',
                'infinity' => 'infinity',
                'ishow' => 'ishow',
                'keep' => 'keep',
                'kickstart' => 'kickstart',
                'ktrig' => 'ktrig',
                'levels' => 'levels',
                'lineofsight' => 'lineofsight',
                'llook' => 'llook',
                'look' => 'look',
                'lose' => 'lose',
                'lotchat' => 'lotchat',
                'mi' => 'mi',
                'mread' => 'mread',
                'mudeq' => 'mudeq',
                'mudinfo' => 'mudinfo',
                'mudlag' => 'mudlag',
                'mudscore' => 'mudscore',
                'mwho' => 'mwho',
                'news' => 'news',
                'nolife' => 'nolife',
                'north' => 'north',
                'northeast' => 'northeast',
                'northwest' => 'northwest',
                'numbers' => 'numbers',
                'nwho' => 'nwho',
                'omp' => 'omp',
                'pabvote' => 'pabvote',
                'panic' => 'panic',
                'pfind' => 'pfind',
                'phase10' => 'phase10',
                'pkwho' => 'pkwho',
                'playcult' => 'playcult',
                'players' => 'players',
                'playgame' => 'playgame',
                'pol' => 'pol',
                'poll' => 'poll',
                'portalchat' => 'portalchat',
                'praise' => 'praise',
                'pretitle' => 'pretitle',
                'profs' => 'profs',
                'put' => 'put',
                'pvote' => 'pvote',
                'qbug' => 'qbug',
                'qf' => 'qf',
                'qidea' => 'qidea',
                'questlist' => 'questlist',
                'quit' => 'quit',
                'qwho' => 'qwho',
                'rally' => 'rally',
                'rating' => 'rating',
                'rdice' => 'rdice',
                'read' => 'read',
                'reboot' => 'reboot',
                'redo' => 'redo',
                'reflex' => 'reflex',
                'repeat' => 'repeat',
                'reps' => 'reps',
                'respond' => 'respond',
                'retrace' => 'retrace',
                'rfinger' => 'rfinger',
                'saliases' => 'saliases',
                'save' => 'save',
                'sc' => 'sc',
                'score' => 'score',
                'score2' => 'score2',
                'search' => 'search',
                'showaddr' => 'showaddr',
                'showalign' => 'showalign',
                'skillquests' => 'skillquests',
                'smuggle' => 'smuggle',
                'south' => 'south',
                'southeast' => 'southeast',
                'southwest' => 'southwest',
                'spades' => 'spades',
                'stats' => 'stats',
                'swho' => 'swho',
                'tagcheck' => 'tagcheck',
                'take' => 'take',
                'time' => 'time',
                'typo' => 'typo',
                'unkeep' => 'unkeep',
                'uno' => 'uno',
                'up' => 'up',
                'uptime' => 'uptime',
                'uptime2' => 'uptime2',
                'uptime3' => 'uptime3',
                'use' => 'use',
                'vaf' => 'vaf',
                'ver' => 'ver',
                'west' => 'west',
                'where' => 'where',
                'who' => 'who',
                'who2' => 'who2',
                'zilch' => 'zilch'
            ]
        ],

        // =============================================
        // HIGH-MORTAL - HM-specific topics and commands
        // =============================================
        'highmortal' => [
            'title' => 'High-Mortal',
            'icon' => 'fa-solid fa-crown',
            'description' => 'High-mortal powers and commands',
            'files' => [
                'emoteto' => 'emoteto',
                'hm' => 'hm',
                'hmblast' => 'hmblast',
                'hmblock' => 'hmblock',
                'hmbolt' => 'hmbolt',
                'hmcharm' => 'hmcharm',
                'hmcheck' => 'hmcheck',
                'hmflee' => 'hmflee',
                'hmheal' => 'hmheal',
                'hmhist' => 'hmhist',
                'hmmuff' => 'hmmuff',
                'hmrejuvenate' => 'hmrejuvenate',
                'hmsever' => 'hmsever',
                'hmsever2' => 'hmsever2',
                'hmshield' => 'hmshield',
                'hmsummon' => 'hmsummon',
                'hmuncurse' => 'hmuncurse',
                'hmwho' => 'hmwho',
                'review' => 'review',
                'setmin' => 'setmin',
                'setmmin' => 'setmmin',
                'setmmout' => 'setmmout',
                'setmout' => 'setmout',
                'setmsg' => 'setmsg',
                'summon' => 'summon',
                'title' => 'title',
                'unfrog' => 'unfrog',
                'whoinvis' => 'whoinvis',
                'whovis' => 'whovis'
            ]
        ],

        // ===========================================
        // MISCELLANEOUS - Games, utilities, etc.
        // ===========================================
        'miscellaneous' => [
            'title' => 'Miscellaneous',
            'icon' => 'fa-solid fa-puzzle-piece',
            'description' => 'Games, utilities, and other topics',
            'files' => [
                'arenachat' => 'arenachat',
                'euchre' => 'euchre',
                'hangman' => 'hangman',
                'lottery' => 'lottery',
                'newb' => 'newb',
                'newbie' => 'newbie',
                'tbmbet' => 'tbmbet',
                'teamwho' => 'teamwho'
            ]
        ]
    ]
];
