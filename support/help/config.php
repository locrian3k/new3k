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
    // EXCLUDED TOPICS
    // ===========================================
    // Topics to hide from the website entirely (test files, wizard-only, etc.)
    // Add the topic name exactly as it appears in the helpdocs file path.
    'excluded_topics' => [
        'saytest',
        'checkmon',
        'sregister',
        'whox',
        'flapchat2',
    ],

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
                'rules' => 'rules'
            ]
        ],

        // ===========================================
        // NEW PLAYERS
        // ===========================================
        'new-players' => [
            'title' => 'New Players',
            'icon' => 'fa-solid fa-seedling',
            'description' => 'Things to know when first starting out',
            'files' => [
                '?' => '?',
                'adventurer' => 'adventurer',
                'commands' => 'commands',
                'faq' => 'faq',
                'guest' => 'guest',
                'help' => 'help',
                'helpers' => 'helpers',
                'login' => 'login',
                'newb' => 'newb',
                'newbie' => 'newbie',
                'newbieland' => 'newbieland',
                'quest' => 'quest',
                'register' => 'register',
                'rules' => 'rules'
            ]
        ],

        // ===========================================
        // CHARACTER & PROGRESSION - Stats, skills, leveling
        // ===========================================
        'character-progression' => [
            'title' => 'Character & Progression',
            'icon' => 'fa-solid fa-chart-line',
            'description' => 'Stats, skills, leveling, and goals',
            'files' => [
                'advance' => 'advance',
                'age' => 'age',
                'alignment' => 'alignment',
                'android' => 'android',
                'angel' => 'angel',
                'ascended' => 'ascended',
                'bards' => 'bards',
                'bladesingers' => 'bladesingers',
                'breed' => 'breed',
                'changeling' => 'changeling',
                'cleric' => 'cleric',
                'crafting' => 'crafting',
                'craftwho' => 'craftwho',
                'cyborg' => 'cyborg',
                'death' => 'death',
                'deathhist' => 'deathhist',
                'deathist' => 'deathist',
                'drink' => 'drink',
                'elemental' => 'elemental',
                'eternals' => 'eternals',
                'fighter' => 'fighter ',
                'fremen' => 'fremen ',
                'formulas' => 'formulas',
                'gentech' => 'gentech',
                'highmortal' => 'highmortal',
                'jedi' => 'jedi',
                'juggernaut' => 'juggernaut',
                'knight' => 'knight',
                'levels' => 'levels',
                'mage' => 'mage',
                'marbs' => 'marbs',
                'marvels' => 'marvels',
                'medals' => 'medals',
                'method' => 'method',
                'milestones' => 'milestones',
                'mission' => 'mission',
                'monk' => 'monk',
                'mudscore' => 'mudscore',
                'necromancer' => 'necromancer',
                'numbers' => 'numbers',
                'priest' => 'priest',
                'professions' => 'professions',
                'profs' => 'profs',
                'profwho' => 'profwho',
                'psicorps' => 'psicorps',
                'questhelp' => 'questhelp',
                'questlist' => 'questlist',
                'questrev' => 'questrev',
                'reputation' => 'reputation',
                'reps' => 'reps',
                'resistance' => 'resistance',
                'sc' => 'sc',
                'scaler' => 'scaler',
                'score' => 'score',
                'score2' => 'score2',
                'seconds' => 'seconds',
                'showalign' => 'showalign',
                'sii' => 'sii',
                'skillquests' => 'skillquests',
                'skills' => 'skills',
                'sorcerer' => 'sorcerer',
                'stats' => 'stats',
                'stats2' => 'stats2',
                'strade' => 'strade',
                'tskill' => 'tskill',
                'wizzing' => 'wizzing',
                'xp' => 'xp',
                'zot' => 'zot'
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
                'anarchy' => 'anarchy',
                'arena' => 'arena',
                'arenachat' => 'arenachat',
                'autohp' => 'autohp',
                'balive' => 'balive',
                'bloodmatch' => 'bloodmatch',
                'butcher' => 'butcher',
                'cbrief' => 'cbrief',
                'clanworld' => 'clanworld',
                'consider' => 'consider',
                'considerx' => 'considerx',
                'counterpoise' => 'counterpoise',
                'damage' => 'damage',
                'defense' => 'defense',
                'eq' => 'eq',
                'evasion' => 'evasion',
                'flee' => 'flee',
                'forcehp' => 'forcehp',
                'gearup' => 'gearup',
                'hmonitor' => 'hmonitor',
                'hp' => 'hp',
                'ibrief' => 'ibrief',
                'invasion' => 'invasion',
                'kill' => 'kill',
                'killed' => 'killed',
                'kills' => 'kills',
                'pk' => 'pk',
                'pkwho' => 'pkwho',
                'reflex' => 'reflex',
                'resistances' => 'resistances',
                'stop' => 'stop',
                'tbmbet' => 'tbmbet',
                'teamwho' => 'teamwho',
                'wimpy' => 'wimpy',
                'wimpydir' => 'wimpydir'
            ]
        ],

        // ===========================================
        // COMMUNICATION - Player interaction
        // ===========================================
        'communication' => [
            'title' => 'Communication',
            'icon' => 'fa-solid fa-comments',
            'description' => 'Every way to interact with other players',
            'files' => [
                'addlink' => 'addlink',
                'addwho' => 'addwho',
                'ask' => 'ask',
                'aread' => 'aread',
                'biff' => 'biff',
                'boards' => 'boards',
                'busy' => 'busy',
                'chatlines' => 'chatlines',
                'checklink' => 'checklink',
                'checkwho' => 'checkwho',
                'converse' => 'converse',
                'dislink' => 'dislink',
                'diswho' => 'diswho',
                'earmuffs' => 'earmuffs',
                'emote' => 'emote',
                'fbchat' => 'fbchat',
                'feelings' => 'feelings',
                'finger' => 'finger',
                'flapchat' => 'flapchat',
                'gam' => 'gam',
                'gshout' => 'gshout',
                'ignorelink' => 'ignorelink',
                'linktell' => 'linktell',
                'lotchat' => 'lotchat',
                'mail' => 'mail',
                'mread' => 'mread',
                'mysoul' => 'mysoul',
                'mywho' => 'mywho',
                'mywho2' => 'mywho2',
                'mywhosync' => 'mywhosync',
                'newsoul' => 'newsoul',
                'notify' => 'notify',
                'omp' => 'omp',
                'party' => 'party',
                'pkchat' => 'pkchat',
                'pol' => 'pol',
                'poll' => 'poll',
                'polls' => 'polls',
                'reply' => 'reply',
                'respond' => 'respond',
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
                'wall' => 'wall',
                'watch' => 'watch',
                'whisper' => 'whisper'
            ]
        ],

        // ===========================================
        // CUSTOMIZATION & DISPLAY - Color and display settings
        // ===========================================
        'customize-display' => [
            'title' => 'Customization & Display',
            'icon' => 'fa-solid fa-palette',
            'description' => 'Color and display customization',
            'files' => [
                'acopy' => 'acopy',
                'alias' => 'alias',
                'ansi' => 'ansi',
                'ansivars' => 'ansivars',
                'ansiwho' => 'ansiwho',
                'aset' => 'aset',
                'describe' => 'describe',
                'modcopy' => 'modcopy',
                'mudansi' => 'mudansi',
                'nickname' => 'nickname',
                'pretitle' => 'pretitle',
                'prompt' => 'prompt',
                'ralias' => 'ralias',
                'rehash' => 'rehash',
                'rnickname' => 'rnickname',
                'setcolor' => 'setcolor',
                'showaddr' => 'showaddr',
                'webpage' => 'webpage'
            ]
        ],

        // ===========================================
        // GAMES & ACTIVITIES - Mini-games and fun
        // ===========================================
        'games-activities' => [
            'title' => 'Games & Activities',
            'icon' => 'fa-solid fa-dice',
            'description' => 'Mini-games and fun',
            'files' => [
                'acronyms' => 'acronyms',
                'dog' => 'dog',
                'dogs' => 'dogs',
                'donations' => 'donations',
                'euchre' => 'euchre',
                'gladiators' => 'gladiators',
                'hangman' => 'hangman',
                'lottery' => 'lottery',
                'phase10' => 'phase10',
                'playcult' => 'playcult',
                'playgame' => 'playgame',
                'rdice' => 'rdice',
                'spades' => 'spades',
                'uno' => 'uno',
                'zilch' => 'zilch'                
            ]
        ],

        // =============================================
        // HIGH-MORTAL - HM powers, building, and commands
        // =============================================
        'highmortal' => [
            'title' => 'High-Mortal',
            'icon' => 'fa-solid fa-crown',
            'description' => 'HM powers, building, and commands',
            'files' => [
                'badditem' => 'badditem',
                'bdelete' => 'bdelete',
                'bdescr' => 'bdescr',
                'bmob' => 'bmob',
                'build' => 'build',
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
                'hmpowers' => 'hmpowers',
                'hmrejuvenate' => 'hmrejuvenate',
                'hmsever' => 'hmsever',
                'hmsever2' => 'hmsever2',
                'hmshield' => 'hmshield',
                'hmsummon' => 'hmsummon',
                'hmuncurse' => 'hmuncurse',
                'hmwho' => 'hmwho',
                'jump' => 'jump',
                'portal' => 'portal',
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
                'whovis' => 'whovis',
                'wizardling' => 'wizardling'
            ]
        ],
                
        // ===========================================
        // ITEMS & INVENTORY - Managing your stuff
        // ===========================================
        'items-inventory' => [
            'title' => 'Items & Inventory',
            'icon' => 'fa-solid fa-box-open',
            'description' => 'Managing your stuff',
            'files' => [
                'afind' => 'afind',
                'auction' => 'auction',
                'autodispose' => 'autodispose',
                'autokeep' => 'autokeep',
                'autoload' => 'autoload',
                'binding' => 'binding',
                'cache' => 'cache',
                'coins' => 'coins',
                'dispose' => 'dispose',
                'drop' => 'drop',
                'exa' => 'exa',
                'examine' => 'examine',
                'get' => 'get',
                'give' => 'give',
                'glance' => 'glance',
                'glimpse' => 'glimpse',
                'i' => 'i',
                'ii' => 'ii',
                'ishow' => 'ishow',
                'keep' => 'keep',
                'mi' => 'mi',
                'mudeq' => 'mudeq',
                'put' => 'put',
                'read' => 'read',
                'remove' => 'remove',
                'search' => 'search',
                'smuggle' => 'smuggle',
                'take' => 'take',
                'unkeep' => 'unkeep',
                'unwield' => 'unwield',
                'use' => 'use',
                'wear' => 'wear',
                'wield' => 'wield'
            ]
        ],

        // ===========================================
        // NAVIGATION & EXPLORATION - Getting around the realms
        // ===========================================
        'navigation-exploration' => [
            'title' => 'Navigation & Exploration',
            'icon' => 'fa-solid fa-compass',
            'description' => 'Getting around the realms',
            'files' => [
                'areadirections' => 'areadirections',
                'arealist' => 'arealist',
                'brief' => 'brief',
                'checkway' => 'checkway',
                'citymap' => 'citymap',
                'dmap' => 'dmap',
                'down' => 'down',
                'east' => 'east',
                'elight' => 'elight',
                'eport' => 'eport',
                'esearch' => 'esearch',
                'exits' => 'exits',
                'explorer' => 'explorer',
                'explorers' => 'explorers',
                'follow' => 'follow',
                'followers' => 'followers',
                'following' => 'following',
                'hail' => 'hail',
                'lineofsight' => 'lineofsight',
                'llook' => 'llook',
                'look' => 'look',
                'lose' => 'lose',
                'map' => 'map',
                'movement' => 'movement',
                'north' => 'north',
                'northeast' => 'northeast',
                'northwest' => 'northwest',
                'retrace' => 'retrace',
                'south' => 'south',
                'southeast' => 'southeast',
                'southwest' => 'southwest',
                'swimming' => 'swimming',
                'townportal' => 'townportal',
                'unfollow' => 'unfollow',
                'up' => 'up',
                'visited' => 'visited',
                'waypoints' => 'waypoints',
                'west' => 'west'
            ]
        ],

        // ===========================================
        // RULES & ADMIN - Rules, reporting, account management
        // ===========================================
        'rules-admin' => [
            'title' => 'Rules & Admin',
            'icon' => 'fa-solid fa-gavel',
            'description' => 'Rules, reporting, and account management',
            'files' => [
                'botting' => 'botting',
                'bug' => 'bug',
                'bugfree' => 'bugfree',
                'cbug' => 'cbug',
                'email' => 'email',
                'fixmob' => 'fixmob',
                'houses' => 'houses',
                'icotag' => 'icotag',
                'idea' => 'idea',
                'ip' => 'ip',
                'kickstart' => 'kickstart',
                'legal' => 'legal',
                'pab' => 'pab',
                'password' => 'password',
                'praise' => 'praise',
                'punishment' => 'punishment',
                'purge' => 'purge',
                'qbug' => 'qbug',
                'qidea' => 'qidea',
                'register' => 'register',
                'reimbursing' => 'reimbursing',
                'reporting' => 'reporting',
                'suicide' => 'suicide',
                'typo' => 'typo'
            ]
        ],

        // ===========================================
        // SYSTEM & UTILITIES - Misc tools and info
        // ===========================================
        'system-utilities' => [
            'title' => 'System & Utilities',
            'icon' => 'fa-solid fa-wrench',
            'description' => 'Misc tools and info',
            'files' => [
                '!' => '!',
                'afk' => 'afk',
                'apm' => 'apm',
                'botcheck' => 'botcheck',
                'cal' => 'cal',
                'calendar' => 'calendar',
                'cassist' => 'cassist',
                'changelog' => 'changelog',
                'chit' => 'chit',
                'clhelp' => 'clhelp',
                'csubmit' => 'csubmit',
                'dungeons' => 'dungeons',
                'events' => 'events',
                'gguild' => 'gguild',
                'guild' => 'guild',
                'guilds' => 'guilds',
                'history' => 'history',
                'idle' => 'idle',
                'iguild' => 'iguild',
                'infinity' => 'infinity',
                'ktrig' => 'ktrig',
                'linkdeath' => 'linkdeath',
                'mudinfo' => 'mudinfo',
                'mudlag' => 'mudlag',
                'nd' => 'nd',
                'news' => 'news',
                'ompvoucher' => 'ompvoucher',
                'panic' => 'panic',
                'pblock' => 'pblock',
                'Pinnacle' => 'Pinnacle',
                'pinnacle' => 'pinnacle',
                'playgame' => 'playgame',
                'quit' => 'quit',
                'rally' => 'rally',
                'reboot' => 'reboot',
                'redo' => 'redo',
                'reminder' => 'reminder',
                'remindme' => 'remindme',
                'remotevaf' => 'remotevaf',
                'repeat' => 'repeat',
                'saliases' => 'saliases',
                'save' => 'save',
                'setmod' => 'setmod',
                'source' => 'source',
                'spawnchar' => 'spawnchar',
                'spawnsecond' => 'spawnsecond',
                'tagcheck' => 'tagcheck',
                'time' => 'time',
                'uptime' => 'uptime',
                'uptime2' => 'uptime2',
                'uptime3' => 'uptime3',
                'vaf' => 'vaf',
                'ver' => 'ver',
                'vote' => 'vote',
                'when' => 'when',
                'wipehist' => 'wipehist',
                'wizard' => 'wizard'
            ]
        ],

        // ===========================================
        // WHO LISTS & INFO - Finding and identifying players
        // ===========================================
        'who-lists' => [
            'title' => 'Who Lists & Info',
            'icon' => 'fa-solid fa-users',
            'description' => 'Finding and identifying players',
            'files' => [
                'awho' => 'awho',
                'cheatwho' => 'cheatwho',
                'finger' => 'finger',
                'friend' => 'friend',
                'friends' => 'friends',
                'hardcore' => 'hardcore',
                'hwho' => 'hwho',
                'mwho' => 'mwho',
                'nolife' => 'nolife',
                'nwho' => 'nwho',
                'pabvote' => 'pabvote',
                'peeron' => 'peeron',
                'pfind' => 'pfind',
                'players' => 'players',
                'qf' => 'qf',
                'qwho' => 'qwho',
                'rating' => 'rating',
                'rfinger' => 'rfinger',
                'swho' => 'swho',
                'where' => 'where',
                'who' => 'who',
                'who2' => 'who2',
                'whoguilds' => 'whoguilds'
            ]
        ]        
    ]
];
