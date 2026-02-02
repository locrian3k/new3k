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
                'email' => 'Email',
                'guest' => 'Guest',
                'ip' => 'IP',
                'password' => 'Password',
                'punishment' => 'Punishment',
                'purge' => 'Purge',
                'quest' => 'Quest',
                'register' => 'Register',
                'reimbursing' => 'Reimbursing',
                'rules' => 'Rules',
                'showaddr' => 'Showaddr',
                'webpage' => 'Webpage'
            ]
        ],
        'communication' => [
            'title' => 'Communication',
            'icon' => 'fa-solid fa-comments',
            'description' => 'How to interact with other players',
            'files' => [
                'addlink' => 'Addlink',
                'addwho' => 'Addwho',
                'ansiwho' => 'Ansiwho',
                'boards' => 'Boards',
                'checklink' => 'Checklink',
                'checkwho' => 'Checkwho',
                'dislink' => 'Dislink',
                'diswho' => 'Diswho',
                'emote' => 'Emote',
                'feelings' => 'Feelings',
                'ignorelink' => 'Ignorelink',
                'linktell' => 'Linktell',
                'mail' => 'Mail',
                'mysoul' => 'Mysoul',
                'mywho' => 'Mywho',
                'mywho2' => 'Mywho2',
                'mywhosync' => 'Mywhosync',
                'newsoul' => 'Newsoul',
                'notify' => 'Notify',
                'say' => 'Say',
                'sayhist' => 'Sayhist',
                'shout' => 'Shout',
                'shoutblock' => 'Shoutblock',
                'shouthist' => 'Shouthist',
                'soul' => 'Soul',
                'soulhist' => 'Soulhist',
                'talk' => 'Talk',
                'talke' => 'Talke',
                'tell' => 'Tell',
                'tellb' => 'Tellb',
                'tellhist' => 'Tellhist',
                'trs' => 'TRS',
                'watch' => 'Watch',
                'whisper' => 'Whisper'
            ]
        ],
        'general' => [
            'title' => 'General',
            'icon' => 'fa-solid fa-book',
            'description' => 'Core gameplay mechanics and commands',
            'files' => [
                'alias' => 'Alias',
                'alignment' => 'Alignment',
                'ansi' => 'Ansi',
                'ansivars' => 'Ansivars',
                'aset' => 'Aset',
                'brief' => 'Brief',
                'bug' => 'Bug',
                'bugfree' => 'Bugfree',
                'checkway' => 'Checkway',
                'citymap' => 'Citymap',
                'commands' => 'Commands',
                'death' => 'Death',
                'dmap' => 'Dmap',
                'drink' => 'Drink',
                'drop' => 'Drop',
                'earmuffs' => 'Earmuffs',
                'evolution' => 'Evolution',
                'faq' => 'FAQ',
                'finger' => 'Finger',
                'get' => 'Get',
                'give' => 'Give',
                'glance' => 'Glance',
                'help' => 'Help',
                'helpers' => 'Helpers',
                'highmortal' => 'High Mortal',
                'history' => 'History',
                'hmpowers' => 'HM Powers',
                'houses' => 'Houses',
                'idea' => 'Idea',
                'idle' => 'Idle',
                'inventory' => 'Inventory',
                'keep' => 'Keep',
                'levels' => 'Levels',
                'linkdeath' => 'Linkdeath',
                'llook' => 'Llook',
                'login' => 'Login',
                'look' => 'Look',
                'method' => 'Method',
                'movement' => 'Movement',
                'mudansi' => 'Mudansi',
                'mudeq' => 'Mudeq',
                'mudscore' => 'Mudscore',
                'mwho' => 'Mwho',
                'newb' => 'Newb',
                'newbie' => 'Newbie',
                'newbieland' => 'Newbieland',
                'nickname' => 'Nickname',
                'nwho' => 'Nwho',
                'picture' => 'Picture',
                'players' => 'Players',
                'prompt' => 'Prompt',
                'qbug' => 'Qbug',
                'qidea' => 'Qidea',
                'questhelp' => 'Questhelp',
                'ralias' => 'Ralias',
                'rehash' => 'Rehash',
                'reporting' => 'Reporting',
                'rnickname' => 'Rnickname',
                'sc' => 'Sc',
                'score' => 'Score',
                'score2' => 'Score2',
                'search' => 'Search',
                'seconds' => 'Seconds',
                'setcolor' => 'Setcolor',
                'source' => 'Source',
                'stats' => 'Stats',
                'suicide' => 'Suicide',
                'swho' => 'Swho',
                'take' => 'Take',
                'typo' => 'Typo',
                'unkeep' => 'Unkeep',
                'vaf' => 'VAF',
                'vote' => 'Vote',
                'waypoints' => 'Waypoints',
                'who' => 'Who',
                'who2' => 'Who2',
                'whoguilds' => 'Whoguilds',
                'wizards' => 'Wizards',
                'wizzing' => 'Wizzing'
            ]
        ],
        'combat' => [
            'title' => 'Combat',
            'icon' => 'fa-solid fa-crosshairs',
            'description' => 'Battle commands and equipment',
            'files' => [
                'kill' => 'Kill',
                'wimpy' => 'Wimpy',
                'wear' => 'Wear',
                'wield' => 'Wield',
                'remove' => 'Remove',
                'unwield' => 'Unwield',
                'eq' => 'Equipment'
            ]
        ],
        'guilds' => [
            'title' => 'Guilds',
            'icon' => 'fa-solid fa-shield-halved',
            'description' => 'Information about player guilds',
            'files' => [
                'adventurer' => 'Adventurer',
                'angel' => 'Angel',
                'bards' => 'Bards',
                'breed' => 'Breed',
                'changeling' => 'Changeling',
                'cybercorps' => 'Cybercorps',
                'elemental' => 'Elemental',
                'fremen' => 'Fremen',
                'gentech' => 'Gentech',
                'jedi' => 'Jedi',
                'juggernaut' => 'Juggernaut',
                'knight' => 'Knight',
                'mage' => 'Mage',
                'monk' => 'Monk',
                'necromancer' => 'Necromancer',
                'priest' => 'Priest',
                'psicorps' => 'Psicorps',
                'sii' => 'Sii',
                'warder' => 'Warder'
            ]
        ],
        'events' => [
            'title' => 'Events',
            'icon' => 'fa-solid fa-trophy',
            'description' => 'PvP and competitive activities',
            'files' => [
                'anarchy' => 'Anarchy',
                'arena' => 'Arena',
                'arenachat' => 'Arenachat',
                'bloodmatch' => 'Bloodmatch',
                'clanworld' => 'Clanworld',
                'gladiators' => 'Gladiators',
                'gladtalk' => 'Gladtalk',
                'invasion' => 'Invasion',
                'pk' => 'PK',
                'tbmbet' => 'Tbmbet',
                'teamwho' => 'Teamwho'
            ]
        ]
    ]
];
