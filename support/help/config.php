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
    // 'static'    - Use the predefined categories below (current setup)
    // 'directory' - Scan a directory for help files
    // 'hybrid'    - Use static categories + scan for uncategorized files
    'source' => 'hybrid',

    // ===========================================
    // CONTENT SOURCE (for modal display)
    // ===========================================
    // Where to fetch help file content from:
    // 'local'    - Read from local directory (when on production server)
    // 'external' - Fetch from external URL (current 3k.org setup)
    'content_source' => 'external',

    // ===========================================
    // LOCAL DIRECTORY SETTINGS
    // (Used when content_source is 'local' or source is 'directory'/'hybrid')
    // ===========================================

    // Path to the help files directory (absolute path on server)
    // This should be the path to the help folder relative to www
    // Example: '/var/www/3k/help/' or '../help/' (relative to www)
    //
    // PRODUCTION NOTE: When deployed, the help folder is at the same level
    // as the www folder. You may need to use something like:
    // 'help_directory' => $_SERVER['DOCUMENT_ROOT'] . '/../help/',
    'help_directory' => '',

    // File extension for local help files (without the dot)
    // The MUD's help files are typically plain text or .c (LPC) files
    // Common options: '' (no extension), 'c', 'txt', 'php'
    'file_extension' => '',

    // ===========================================
    // EXTERNAL URL SETTINGS
    // (Used when content_source is 'external' or display_mode is 'link')
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
                'dislink' => 'dislink',
                'diswho' => 'diswho',
                'emote' => 'emote',
                'feelings' => 'feelings',
                'ignorelink' => 'ignorelink',
                'linktell' => 'linktell',
                'mail' => 'mail',
                'mysoul' => 'mysoul',
                'mywho' => 'mywho',
                'mywho2' => 'mywho2',
                'mywhosync' => 'mywhosync',
                'newsoul' => 'newsoul',
                'notify' => 'notify',
                'say' => 'say',
                'sayhist' => 'sayhist',
                'shout' => 'shout',
                'shoutblock' => 'shoutblock',
                'shouthist' => 'shouthist',
                'soul' => 'soul',
                'soulhist' => 'soulhist',
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
        'general' => [
            'title' => 'General',
            'icon' => 'fa-solid fa-book',
            'description' => 'Core gameplay mechanics and commands',
            'files' => [
                'alias' => 'alias',
                'alignment' => 'alignment',
                'ansi' => 'ansi',
                'ansivars' => 'ansivars',
                'aset' => 'aset',
                'brief' => 'brief',
                'bug' => 'bug',
                'bugfree' => 'bugfree',
                'checkway' => 'checkway',
                'citymap' => 'citymap',
                'commands' => 'commands',
                'death' => 'death',
                'dmap' => 'dmap',
                'drink' => 'drink',
                'drop' => 'drop',
                'earmuffs' => 'earmuffs',
                'evolution' => 'evolution',
                'faq' => 'faq',
                'finger' => 'finger',
                'get' => 'get',
                'give' => 'give',
                'glance' => 'glance',
                'help' => 'help',
                'helpers' => 'helpers',
                'highmortal' => 'highmortal',
                'history' => 'history',
                'hmpowers' => 'hmpowers',
                'houses' => 'houses',
                'idea' => 'idea',
                'idle' => 'idle',
                'inventory' => 'inventory',
                'keep' => 'keep',
                'levels' => 'levels',
                'linkdeath' => 'linkdeath',
                'llook' => 'llook',
                'login' => 'login',
                'look' => 'look',
                'method' => 'method',
                'movement' => 'movement',
                'mudansi' => 'mudansi',
                'mudeq' => 'mudeq',
                'mudscore' => 'mudscore',
                'mwho' => 'mwho',
                'newb' => 'newb',
                'newbie' => 'newbie',
                'newbieland' => 'newbieland',
                'nickname' => 'nickname',
                'nwho' => 'nwho',
                'picture' => 'picture',
                'players' => 'players',
                'prompt' => 'prompt',
                'qbug' => 'qbug',
                'qidea' => 'qidea',
                'questhelp' => 'questhelp',
                'ralias' => 'ralias',
                'rehash' => 'rehash',
                'reporting' => 'reporting',
                'rnickname' => 'rnickname',
                'sc' => 'sc',
                'score' => 'score',
                'score2' => 'score2',
                'search' => 'search',
                'seconds' => 'seconds',
                'setcolor' => 'setcolor',
                'source' => 'source',
                'stats' => 'stats',
                'suicide' => 'suicide',
                'swho' => 'swho',
                'take' => 'take',
                'typo' => 'typo',
                'unkeep' => 'unkeep',
                'vaf' => 'vaf',
                'vote' => 'vote',
                'waypoints' => 'waypoints',
                'who' => 'who',
                'who2' => 'who2',
                'whoguilds' => 'whoguilds',
                'wizards' => 'wizards',
                'wizzing' => 'wizzing'
            ]
        ],
        'combat' => [
            'title' => 'Combat',
            'icon' => 'fa-solid fa-crosshairs',
            'description' => 'Battle commands and equipment',
            'files' => [
                'kill' => 'kill',
                'wimpy' => 'wimpy',
                'wear' => 'wear',
                'wield' => 'wield',
                'remove' => 'remove',
                'unwield' => 'unwield',
                'eq' => 'eq'
            ]
        ],
        'guilds' => [
            'title' => 'Guilds',
            'icon' => 'fa-solid fa-shield-halved',
            'description' => 'Information about player guilds',
            'files' => [
                'adventurer' => 'adventurer',
                'angel' => 'angel',
                'bards' => 'bards',
                'breed' => 'breed',
                'changeling' => 'changeling',
                'cybercorps' => 'cybercorps',
                'elemental' => 'elemental',
                'fremen' => 'fremen',
                'gentech' => 'gentech',
                'jedi' => 'jedi',
                'juggernaut' => 'juggernaut',
                'knight' => 'knight',
                'mage' => 'mage',
                'monk' => 'monk',
                'necromancer' => 'necromancer',
                'priest' => 'priest',
                'psicorps' => 'psicorps',
                'sii' => 'sii',
                'warder' => 'warder'
            ]
        ],
        'events' => [
            'title' => 'Events',
            'icon' => 'fa-solid fa-trophy',
            'description' => 'PvP and competitive activities',
            'files' => [
                'anarchy' => 'anarchy',
                'arena' => 'arena',
                'arenachat' => 'arenachat',
                'bloodmatch' => 'bloodmatch',
                'clanworld' => 'clanworld',
                'gladiators' => 'gladiators',
                'gladtalk' => 'gladtalk',
                'invasion' => 'invasion',
                'pk' => 'pk',
                'tbmbet' => 'tbmbet',
                'teamwho' => 'teamwho'
            ]
        ]
    ]
];
