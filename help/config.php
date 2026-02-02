<?php
/**
 * Help Files Configuration
 *
 * This file controls how help files are loaded and displayed.
 * Modify these settings when deploying to the production server.
 */

return [
    // ===========================================
    // HELP FILE SOURCE CONFIGURATION
    // ===========================================

    // Set to 'static' to use the predefined categories below
    // Set to 'directory' to scan a directory for help files
    // Set to 'hybrid' to use static categories but scan directory for uncategorized files
    'source' => 'static',

    // ===========================================
    // DIRECTORY SCANNING SETTINGS
    // (Only used when source is 'directory' or 'hybrid')
    // ===========================================

    // Path to the help files directory (absolute path on server)
    // Example: '/var/mud/lib/doc/help/' or '/home/3k/help/'
    'help_directory' => '',

    // File extension to look for (without the dot)
    // Common options: 'php', 'c', 'txt', 'html'
    'file_extension' => 'php',

    // ===========================================
    // URL CONFIGURATION
    // ===========================================

    // Base URL for linking to help files
    // For external: 'https://3k.org/help/'
    // For local: '/help/files/' or '/help/view.php?topic='
    'base_url' => 'https://3k.org/help/',

    // URL suffix (file extension for links)
    // Set to '.php' for PHP files, '' (empty) if using a viewer script with query params
    'url_suffix' => '.php',

    // Open links in new window?
    'open_in_new_window' => true,

    // ===========================================
    // STATIC HELP FILE CATEGORIES
    // (Used when source is 'static' or 'hybrid')
    // ===========================================
    //
    // Format:
    // 'category_id' => [
    //     'title' => 'Display Title',
    //     'icon' => 'fa-solid fa-icon-name',
    //     'description' => 'Brief description',
    //     'files' => [
    //         'filename' => 'Display Name',
    //         ...
    //     ]
    // ]
    //
    // To add new help files, simply add them to the appropriate category's 'files' array.
    // The key is the filename (without extension), the value is the display name.

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
