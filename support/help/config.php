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
    'source' => 'static',

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
                'email' => 'email',
                'guest' => 'guest',
                'ip' => 'ip',
                'password' => 'password',
                'punishment' => 'punishment',
                'purge' => 'purge',
                'quest' => 'quest',
                'register' => 'register',
                'reimbursing' => 'reimbursing',
                'rules' => 'rules',
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
                'boards' => 'boards',
                'checklink' => 'checklink',
                'checkwho' => 'checkwho',
                'converse' => 'converse',
                'dislink' => 'dislink',
                'diswho' => 'diswho',
                'emote' => 'emote',
                'feelings' => 'feelings',
                'finger' => 'finger',
                'gossip' => 'gossip',
                'gossipblock' => 'gossipblock',
                'gossiphist' => 'gossiphist',
                'gossipwho' => 'gossipwho',
                'ignorelink' => 'ignorelink',
                'linktell' => 'linktell',
                'mail' => 'mail',
                'mysoul' => 'mysoul',
                'mywho' => 'mywho',
                'mywho2' => 'mywho2',
                'mywhosync' => 'mywhosync',
                'newsoul' => 'newsoul',
                'notify' => 'notify',
                'party' => 'party',
                'reply' => 'reply',
                'say' => 'say',
                'sayhist' => 'sayhist',
                'shout' => 'shout',
                'shoutblock' => 'shoutblock',
                'shouthist' => 'shouthist',
                'soul' => 'soul',
                'soulhist' => 'soulhist',
                'soulnew' => 'soulnew',
                'talk' => 'talk',
                'talke' => 'talke',
                'tell' => 'tell',
                'tellb' => 'tellb',
                'tellhist' => 'tellhist',
                'trs' => 'trs',
                'watch' => 'watch',
                'whisper' => 'whisper'
            ]
        ],

        // ===========================================
        // GENERAL - Core gameplay (General + Basic Topics)
        // ===========================================
        'general' => [
            'title' => 'General',
            'icon' => 'fa-solid fa-book',
            'description' => 'Core gameplay mechanics and information',
            'files' => [
                // General Topics
                'anarchy' => 'anarchy',
                'areadirections' => 'areadirections',
                'arena' => 'arena',
                'autoload' => 'autoload',
                'bloodmatch' => 'bloodmatch',
                'boards' => 'boards',
                'bote' => 'bote',
                'citymap' => 'citymap',
                'clanworld' => 'clanworld',
                'crafting' => 'crafting',
                'formulas' => 'formulas',
                'helpers' => 'helpers',
                'highmortal' => 'highmortal',
                'hmpowers' => 'hmpowers',
                'houses' => 'houses',
                'icotag' => 'icotag',
                'idle' => 'idle',
                'invasion' => 'invasion',
                'linkdeath' => 'linkdeath',
                'linktell' => 'linktell',
                'method' => 'method',
                'milestones' => 'milestones',
                'picture' => 'picture',
                'pk' => 'pk',
                'professions' => 'professions',
                'questhelp' => 'questhelp',
                'reporting' => 'reporting',
                'seconds' => 'seconds',
                'source' => 'source',
                'vote' => 'vote',
                'waypoints' => 'waypoints',
                'whoguilds' => 'whoguilds',
                'wizzing' => 'wizzing',
                // Basic Topics
                'alignment' => 'alignment',
                'botting' => 'botting',
                'damage' => 'damage',
                'death' => 'death',
                'defense' => 'defense',
                'faq' => 'faq',
                'history' => 'history',
                'pants' => 'pants',
                'resistance' => 'resistance',
                'skills' => 'skills',
                'stats2' => 'stats2'
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
                // Combat Topics
                'drink' => 'drink',
                'remove' => 'remove',
                'unwield' => 'unwield',
                'wield' => 'wield',
                // Mortal Combat Commands
                'akills' => 'akills',
                'autohp' => 'autohp',
                'cbrief' => 'cbrief',
                'evasion' => 'evasion',
                'forcehp' => 'forcehp',
                'ibrief' => 'ibrief',
                'kill' => 'kill',
                'killed' => 'killed',
                'kills' => 'kills',
                'stop' => 'stop',
                'wimpy' => 'wimpy',
                'wimpydir' => 'wimpydir',
                'eq' => 'eq',
                'wear' => 'wear'
            ]
        ],

        // ===========================================
        // GUILDS - Guild information
        // ===========================================
        'guilds' => [
            'title' => 'Guilds',
            'icon' => 'fa-solid fa-shield-halved',
            'description' => 'Information about player guilds',
            'files' => [
                'adventurer' => 'adventurer',
                'android' => 'android',
                'angel' => 'angel',
                'ascended' => 'ascended',
                'bards' => 'bards',
                'bladesingers' => 'bladesingers',
                'breed' => 'breed',
                'changeling' => 'changeling',
                'cleric' => 'cleric',
                'cyborg' => 'cyborg',
                'elemental' => 'elemental',
                'fighter' => 'fighter',
                'fremen' => 'fremen',
                'gentech' => 'gentech',
                'guilds' => 'guilds',
                'jedi' => 'jedi',
                'juggernaut' => 'juggernaut',
                'knight' => 'knight',
                'mage' => 'mage',
                'monk' => 'monk',
                'necromancer' => 'necromancer',
                'priest' => 'priest',
                'psicorps' => 'psicorps',
                'sii' => 'sii',
                'sorcerer' => 'sorcerer'
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
                'ansivars' => 'ansivars',
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
                '!' => '!',
                'acronyms' => 'acronyms',
                'advance' => 'advance',
                'afind' => 'afind',
                'afk' => 'afk',
                'age' => 'age',
                'alias' => 'alias',
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
                'inventory' => 'inventory',
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
                'movement' => 'movement',
                'mudeq' => 'mudeq',
                'mudinfo' => 'mudinfo',
                'mudlag' => 'mudlag',
                'mudscore' => 'mudscore',
                'mwho' => 'mwho',
                'news' => 'news',
                'nickname' => 'nickname',
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
                'prompt' => 'prompt',
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
                'ralias' => 'ralias',
                'rehash' => 'rehash',
                'rnickname' => 'rnickname',
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
                'suicide' => 'suicide',
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
                // High-Mortal Topics
                'jump' => 'jump',
                'portal' => 'portal',
                // High-Mortal Commands
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
                'euchre' => 'euchre',
                'hangman' => 'hangman',
                'lottery' => 'lottery',
                'gladiators' => 'gladiators',
                'arenachat' => 'arenachat',
                'tbmbet' => 'tbmbet',
                'teamwho' => 'teamwho',
                'evolution' => 'evolution',
                'newb' => 'newb',
                'newbie' => 'newbie',
                'newbieland' => 'newbieland',
                'wizards' => 'wizards',
                'login' => 'login'
            ]
        ]
    ]
];
