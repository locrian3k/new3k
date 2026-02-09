/**
 * OMP (Official MUD Party) Page Scripts
 * Handles timeline interactions and modal displays
 */

// OMP Data - Historical information for each gathering
const ompData = {

  /* ==========================================================================
     EXAMPLE FUTURE OMP - Uncomment and modify when announcing a new gathering
     ==========================================================================

  '2026': {
    year: '2026',
    location: 'Detroit, MI',
    dates: 'August 7-9, 2026',
    venue: {
      name: 'Crowne Plaza Detroit Metro Airport',
      address: '8000 Merriman Rd, Romulus, MI 48174',
      phone: '(734) 729-2600',
      groupName: 'The Marble Group',
      roomRate: '$109/night (single/double occupancy)',
      amenities: ['Free parking', 'Complimentary breakfast', 'Free WiFi', 'Indoor pool', 'Fitness center'],
      coverCharge: '$25 per person (covers hospitality suite snacks & drinks)',
      bookingDeadline: 'July 15, 2026'
    },
    showRideshare: true,
    schedule: {
      friday: [
        'Check-in begins (3:00 PM)',
        'Hospitality suite opens (4:00 PM)',
        'Meet & greet and catching up',
        'Group dinner at local restaurant (7:00 PM)',
        'Evening socializing in suite'
      ],
      saturday: [
        'Breakfast at hotel',
        'Group activity TBD (optional)',
        'Free time for exploration',
        'Group dinner (6:30 PM)',
        'Evening festivities and games'
      ],
      sunday: [
        'Farewell breakfast (9:00 AM)',
        'Check-out (11:00 AM)',
        'Safe travels home!'
      ]
    },
    activities: [
      'Hospitality suite with snacks and drinks',
      'Group dinners',
      'Optional group activity (TBD)',
      'Lots of catching up and reminiscing'
    ],
    stories: 'Join us for another epic gathering of 3Kingdoms players! Whether you\'re a veteran of many OMPs or this is your first time meeting your online friends in person, you\'re in for an unforgettable weekend.',
    photoCredits: []
  },

  ========================================================================== */

  '2013': {
    year: '2013',
    location: 'Chicago, IL',
    dates: 'August 8-10',
    venue: {
      name: 'Sheraton Suites Elk Grove Village',
      address: 'Chicago, IL',
      phone: '(800) 325-3535 or (847) 290-1600',
      groupName: 'The Marble Group',
      roomRate: '$89 up to Quad occupancy',
      amenities: ['Free parking'],
      coverCharge: '$10/person at the door. Kids 12 and under free',     
    },
    showRideshare: true,
  },

  '2012': {
    year: '2012',
    location: 'Lansing, MI',
    dates: 'August 9-12',
    venue: {
      name: 'Okemos Conference Center',
      address: 'Okemos, MI',
      phone: '(734) 729-2600',
      groupName: 'The Marble Group',
      roomRate: '$85 double occupancy',
      amenities: ['Free parking', 'Complimentary breakfast', 'Free WiFi'],
      coverCharge: [
        '4-day Full-Access Pass: $50 per person (3K/3Sers & guests only)',
        'Saturday & Sunday Gaming Pass: $20 per person',
        'Saturday Only Gaming Pass: $15 per person',
        'Sunday Only Gaming Pass: $10 per person',
        '*Kids 12 and under are free with an adult (though they can\'t win prizes',
        '*Family rates available - inquire for details',
        '*If you VAF $75 or more in the upcoming OMP VAF drive, you\'ll get a 4-day Full-Access pass FREE! (on top of whatever else the OMP drive will be offering this year)'
      ],     
    },
    schedule: {
      thursday: [
        '3K/3S Exclusive Attendance',
        'Dog punting',
        'Card games',
        'Marble hunt',
        'Poker'
      ],
      friday: [
        '3K/3S Exclusive Attendance',
        'Dog punting',
        'Card games',
        'Marble hunt',
        'Poker',
        'much more, plus door prizes!'        
      ],
      saturday: [
        'Open gaming for everyone',
        'Games',
        'Games',
        'More games',
        'Discussions, workshops, vendors, and door prizes given away throughout both Saturday and Sunday'
      ],
      sunday: [
        'Open gaming for everyone',
        'Games',
        'Games',
        'More games',
        'Discussions, workshops, vendors, and door prizes given away throughout both Saturday and Sunday'
      ]
    },
    activities: [
      'Wait, did that say Sunday? You bet it did. One of the great things about OMPs in the past has been the opportunity to play games - board games, RPGs, card games etc. - games that you normally would\'t have in your closet, or have time for, or have other players to play with. To this end, for 2012, we\'re doing a couple things new:',
      '1) We\'re inviting local game masters and gamers to organize the gaming aspect that was mentioned above. Not only will you be able to really get your gaming on, but you will be able to do so with organization, participation and game availability never before seen at an OMP.',
      '2) We\'re expanding to Sunday also to allow for even more gaming goodness.',
      'That said, the OMP 2012 will be two parts of one great whole!',
      'Thursday & Friday : The OMP as you always have known it - dog punting, card games, marble hunt, poker, lots of other stuff and of course, the awesome door prizes. This portion of the event is for 3K/3Sers and their guests only. To be clear, the main OMP event (door prizes, etc.) has historically been on Saturday night, this year it\'s on Friday night.',
      'Saturday & Sunday : Games, games and more games. Plus, there will be discussions, workshops, vendors and door prizes given away throughout both days. Plus plenty of places to just hang out and socialize. This portion of the event is open to any and all gamers.',
    ],
  },

  '2011-spring': {
    year: '2011',
    season: 'Spring',
    location: 'San Jose, CA',
    dates: 'April 14-16',
    venue: {
      name: 'Clarion Hotel San Jose Airport',
      address: 'San Jose, CA',
      phone: '(408) 392-2419',
      groupName: 'The Marble Group',
      roomRate: '$79 double occupancy',
      amenities: ['Free parking', 'Complimentary breakfast', 'Free WiFi', 'Shuttle'],
    },
    showRideshare: true,
  },

  '2011-summer': {
    year: '2011',
    season: 'Spring',
    location: 'Philadelphia, PA',
    dates: 'August 4-6',
    venue: {
      name: 'DoubleTree Guest Suites',
      address: 'Plymouth Meeting, PA',
      phone: '(610) 897-4147',
      groupName: 'The Marble Group',
      roomRate: '$109 double occupancy',
      amenities: ['Free parking', 'Complimentary breakfast', 'Free WiFi'],      
    },
    showRideshare: true,
  },

  '2010': {
    year: '2010',
    location: 'Chicago, IL',
    dates: 'August 12-14',
    venue: {
      name: "Sheraton Suites, Elkgrove Village",
      address: 'Chicago, IL',
      phone: '(800) 325-3535',
      groupName: 'The Marble Group',
      roomRate: '$79 up to Quad occupancy',
      amenities: ['Free parking'],
    },
    showRideshare: true,
  },

  '2009': {
    year: '2009',
    location: 'Romulus, MI',
    dates: 'August 5-8',
    venue: {
      name: 'Clarion Hotel - Detroit Metro Airport',
      address: '8600 Merriman Road, Romulus, MI 48174',
      phone: '(734) 728-7900',
      groupName: 'The Marble Group',
      roomRate: '$72/night',
      amenities: ['Free parking', 'Free airport shuttle', 'Free Wifi', 'Free continental breakfast (hot breakfast only $6 more)'],      
    },
    showRideshare: true,
  },

  '2008': {
    year: '2008',
    location: 'Indianapolis, IN',
    dates: 'August 6-9',
    venue: {
      name: 'Radisson Hotel Indianapolis Airport',
      address: 'Indianapolis, IN',
      phone: '(888) 201-1718',
      groupName: 'The Marble Group',
      roomRate: '$89/night',
      amenities: ['Free parking', 'Free airport shuttle', 'Free Wifi'],       
    },
    showRideshare: true,
    activities: [
      'Texas Holdem Tourney',
      'Wizard Dinner',
      'Euchre Tourney',
      'Dog Punting',
      'Uno Tourney',
      'Marble Hunt'
    ],
    schedule: {
      thursday: [
        'Free Day (no official scheduled activities)'
      ],
      friday: [
        '1-4pm - Texas Holdem Tournament (Host: Riekl)',
        '6-8pm - Wizard Dinner (Host: The Marble Group)',
        '9pm-midnight - Euchre Tournament (Host: Rastafan)'
      ],
      saturday: [
        '11am-noon - Dog Punting (Host: Darrkin)',
        'noon-1pm - Free Time (nothing scheduled)',
        '1-4pm - Uno Tournament (Host: Calaran)',
        '4-5pm - Marble Hunt',
        '5-7pm - OMP Registration, Marble turn-in, dinner, fun!',
        '7-9:30pm - Scavenger hunt (Host: Riekl)',
        '9:30-10pm - Scavenger hunt Judging',
        '10pm-midnight - Game/tournament awards, door prizes, more fun!'
      ],
    },
  },

  '2007': {
    year: '2007',
    location: 'Chicago, IL',
    dates: 'August 2-4',
    venue: {
      name: "Sheraton Suites, Elkgrove Village",
      address: 'Chicago, IL',
      phone: '(888) 627-7052',
      groupName: 'The Marble Group',
      roomRate: '$89.00 up to Quad occupancy',
      amenities: ['Free parking'],      
    },
    showRideshare: true,
    activities: [
      'Texas Holdem Tourney',
      'Wizard Dinner',
      'Euchre Tourney',
      'Dog Punting',
      'Uno Tourney',
      'Marble Hunt'
    ],    
    schedule: {
      thursday: [
        'Free Day (no official scheduled activities)'
      ],
      friday: [
        '1-5pm - Texas Holdem Tournament (Host: Riekl)',
        '5:30-7:30pm - Wizard Dinner (Host: Tensor/Rastafan)',
        '8-10pm - Euchre Tournament (Host: Rastafan)'
      ],
      saturday: [
        '11am-noon - Dog Punting (Host: Eriond)',
        'noon-1pm - Free Time (nothing scheduled, go have lunch!)',
        '1-3pm - Uno Tournament (Host: Riekl)',
        '3-4pm - Marble Hunt',
        '4-6pm - OMP Registration, Marble turn-in, dinner, fun!',
        '6-8:30pm - Scavenger hunt',
        '8:30-9pm - Judging',
        '10pm-midnight - Game/tournament awards, door prizes, more fun!'
      ],
    },
    photoCredits: ['Chewbackon', 'Elektra', 'Riekl', 'Molly', 'Icelady', 'Kwin', 'Pheonyx']
  },

  '2006': {
    year: '2006',
    location: 'Williamsburg, VA',
    dates: 'August',
    venue: {
      name: 'Best Western Patrick Henry Inn',
      address: 'Williamsburg, VA'
    },
    stories: [
      'Nothing says "3K OMP" like a group of male mudders (are there any other kind?) clustered outside of a hotel entrance, some smoking, some flapping, but generally just disturbing the entire population of a city. Or in the case of 2006, a small town in the middle of Nowhere, Virginia called Williamsburg. This year, however, the hotel got smart and gave us our very own entire building to ransack, corralling us mostly away from their other clientele.',
      'The name of the 2006 OMP should have been "Guess the Hotel!". We started off with reservations at the Clarion Hotel George Washington Inn, and then got moved somewhere else, and then back to the GWI, and finally ended up at the Best Western Patrick Henry Inn (notice a common theme of names here?). And this is where we were to leave our permanent mark for 2006.',
      'Many people arrived Thursday, herding into our conference room/building like the good sheep that we are, and enjoying the company of the other early-arrivers. Pistil quickly brought out his cache of board and card games that take hours (and sometimes days) to complete, and this year saw the introduction of Hive and Risk: Godstorm along with old favorites like Axis & Allies, Set, Shogun, Settlers of Catan, Articulate, and of course, Euchre. The gameplay proceeded well into the wee hours of morning, as usual.',
      'Friday saw the arrival of most of the rest of the attendees, all having found some way to make the 40 minute drive from the airport to the hotel. There was much playing of games, and thanks to several people who brought wireless networking equipment, we were able to get our laptops online in the conference room. The wireless also allowed Targ and Sorva to set up webcams for those not fortunate enough to attend to be able to watch the festivities. There was a projector hooked up to Zion\'s laptop as well, giving us all the opportunity to watch Rastafan get on 3K and proceed to try to kill Targ and others several times by setting a Cupid upon them. Ahhh, good times.',
      'Friday evening, we had the euchre tournament, which ended in a tie between Bigfoot and Tryst. But in a tie-breaker match where they were allowed to pick their partner, Bigfoot took the win.',
      'On Saturday, Riekl hosted the annual Dog Punting contest at 11 AM, which Kryllith won, and the ever-present Uno Tournament at 1 PM. Waya won the Best of the Best, and Azazel the Best of the Worst.',
      'At 4 PM Saturday, the conference room was cleared of all but wizards, doors were locked, and curtains were drawn in order to set up for the Official OMP Event. Prizes were organized, ticket buckets labeled, bananas stacked (this will be explained in a moment), and nametags issued. At around 5 PM, people filtered back into the conference room to find a veritable cornucopia of door prizes, fruit, and free pizza. Soon afterwards, the Scavenger Hunt was announced and commenced. Hours later when the scores were finally tabulated (punctuated by an endless droning of the Lumberjack Song), the winner was the team of Sparkle, Affeinec, William, and Dreamer.',
      'After the scavenger hunt, a new event was introduced this year: The Marble Hunt. Chewbacon ran around the conference building like a chicken with its head cut off, hiding over 100 marbles while everyone else was doing their scavenger hunting. It was announced that each marble found would equate to 1 free Quest Point on the mud, with the 2 large marbles worth 25 each. They were placed mostly in plain sight, ranging anywhere from bushes to payphone coin returns to light fixtures, but by the time it got started, it was almost too dark to do this hunt effectively. But despite the darkness, this seemed to be a huge hit with everyone, and in coming years, the hunt will be held earlier in the day.',
      'Once the madness of the Marble Hunt was finished, the prize raffle began. This year\'s pile of prizes was enormous, and grand prizes included swords, Xbox\'s, Nintendo\'s, several GPS units, and various other yummy treats. Rastafan took home the marbles.',
      'Total Attendance for the official event: 70, including 2 babies.',
      'But all of this pales in comparison to the real Main Event of OMP 2006, Williamsburg: FREE BANANAS! Whether they were being thrown at a horse in a dark field, or whipped across a conference room like a boomerang, the enormous stack of free bananas played a major role in everyone\'s OMP 2006 experience.',
      'And like the \'Wyoming!\' and \'558!\' of years past, this year brought a new buzzword to the very specific dialect of OMP inside jokes on 3 Kingdoms:',
      'HUANNY!',
      'noun - 1. The long, high-pitched sound made by a horse when a banana is hurled at its rear-end in a dark pasture.',
      '[From Old Targish huannyen, to huanny, probably of imitative origin.]',
    ],
    photoCredits: ['Sorva', 'Zorbaine', 'Estarlol', 'Targ', 'Chewbacon', 'Riekl']
  },

  '2005': {
    year: '2005',
    location: 'Romulus, MI',
    dates: 'August',
    venue: {
      name: 'Detroit Metro Airport',
      address: 'Romulus, MI'
    },
    stories: [
      'This year\'s OMP was held just a few hundred yards from the Detroit Metro airport which allowed for easy transport.',
      'The conference room was a good size for our group and we had little difficulty in having plenty of room for multiple games and mudding sessions. Yes people still fly thousands of miles to play 3k from OMP, luckily wireless internet was freely available from the hotel!',
      'Thursday was a very slow day in the conference room, several people went to Cedar Point just a few hours away for a day of thrill seeking. There was enough left to get in a game of Risk 2210 (Original Risk was not even brought out this year, 2210 has taken over!). At another table a game of Texas Hold\'em also sprung up to entice the gamers.',
      'Friday saw a great deal of gaming activity as more people arrived and those from Cedar Point returned. Euchre, Risk 2210, Axis & Allies, Shogun (wow what a long game!), and Articulate dominated the conference room. There were groups of people just chatting away, and of course the ever present mudders and OMP camera capturing it all for those poor souls who could not attend in person.',
      'Friday night saw a fearsly competitive Euchre tournament with Rastafan coordinating the event and somehow not killing anyone with the 5000 "where do I go now??" questions.',
      'Finally the main event was upon us, Saturday ! OMP !!',
      'Saturday got off to a start with yet another game of Risk 2210, which was quickly interrupted as it was time for Dog Punting !! What an event, we had shoes flying, whiffs, and expert soccer trained punts. This was a very fun event and well coordinated! Upon the conclusion everyone shuffled back inside to get a quick bite to eat before the UNO tournament began.',
      'UNO was a fairly drama free event, most everyone knew how to play and there was a shocking lack of (noticeable) cheating. A good time was had by all with the losers slowly filtering out to Axis & Allies and other strategy games which dominated the OMP free time.',
      'Oops ! It\'s 4pm, everyone out for setup time! Everyone was kicked out of the conference room so the hosts could prepare for a fun filled evening. When everyone was let back in there were a lot of "ooh" and "ahh" and "MINE!" as eyes fell over the truly extraordinary door prizes to be won this year. There was a well organized line to submit your VAF and get your yellow (low end) and red (high end) prize tickets. You could also choose to enter the drawing for the 3k Marbles but you had to swear in blood that you would return next year with them. There were guild posters on the walls for everyone to sign in and show their guild patronage.',
      'There was some time for chit chat as people put faces to names and forged friendships. There was more then enough food various pizza and sub offerings to suit anyone\'s taste, and unlike last year the subs were actually sliced! Shortly, it was time for the Scavenger Hunt! Teams were quickly formed and off they went, a bunch of half drunk mudders scavenging across a strange city for obscure items and pictures. Those not participating talked about going to a strip club, played Shogun and other strategic games, you might think it odd that discussion would occur or that the games would win out, but not if you knew mudders.',
      'After the conclusion of the Scavenger judging (with some very odd scenes and pictures resulting!) it was time for the door prize drawings! The way it worked this year was everyone paid $10 and get one strip of red tickets, for $20 you got 2 strips. Everyone had one yellow ticket. You took your red tickets, writing your name on them and placed them into styrofoam buckets which you could not touch or see how many tickets were inside. The drawings were conducted with much ooh\'ing and aahing, some people winning multiple grand prizes, some not winning any. However everyone was guaranteed a prize and those were the yellow ticket items, many movies, books and other odds and ends prizes were up for grabs! Everyone was a winner except for the now famous \'558\' ticket holder. The winner of the 3k marbles was Riekl (and yes he brought them back in 2006!).',
      'A very successful OMP both in fun had and in lack of police being called on us! See you all next year !'
    ],
    photoCredits: ['Riekl', 'Miyurachi', 'Crolack']
  },

  '2004': {
    year: '2004',
    location: 'St. Louis, MO',
    dates: 'July',
    stories: [
      'St. Louis.... I was going to start with, "it was a hot and sticky weekend", but it wasn\'t. It was a cool and somewhat grey weekend.',
      'This year, as in years past, we started by taking over the lobby. The hotel did not really like this at all, but what else is new. Any ways we quickly were moved to the conference room, which worked out extremely well, as we could drink, play our various games and just have a place to hang out without interrupting the Bible Group that was also in the hotel. For the most part, people just hung out at the hotel. Though a small group, led by Hobbes did get to see the Cardinals play and another group went to the horror known as Dave & Busters. (I say horror as I heard the service was just downright awful. I\'m glad the group I was with got lost).',
      'You know you are an addict when 1) you bring a laptop to the OMP, 2) you are mudding from the OMP via a wireless connection. Yes, you heard me right. The great thing about this was, Polaris set up a webcam and shouted the link on the mud so that people could see the party in action.',
      'Like years past, everyone always likes to hang out and play various games. This year we had the following: Phase 10, Munchkin, Settlers of Catan, Articulate, Axis and Allies, Risk, and of course, UNO.',
      'Once again we had a big parking lot with plenty of space, so we decided to do Dog Punting. While it was a low turn out, it was definitely a lot of fun. After that we ran inside for the Uno Tourney. We had a record 35 people join in, what a lot of fun.',
      'The main attraction... The OMP.',
      'Like every other year we politely asked everyone to leave the room so that setup could begin. The door prizes had to be brought down from Pistil\'s room and the registration table set up.',
      'Once this was done, the line started coming in. First stop was with Pistil and Tensor to submit your VAF. Next was Sorcha with the tickets and Vraal with the "stuff". Once you were done there you headed over to Nanook and Vryce to get a shirt, Takamori and Stalin were also here and there doing their share.',
      'Once everyone was in, the food started arriving. While we had pizza again, we also had subs from Subway. Though they forgot a big thing regarding these, they didn\'t cut them. So handy Valletta to the rescue, she grabbed a plastic knife and went to town.',
      'Once food was done with, Tensor explained how the tickets and buckets would work this year. I didn\'t think the buckets would be a good idea, but I\'ll admit I was wrong and Tensor was right, as he is always right. ;) Anyways, he went over step-by-step what to do with each piece of the ticket. Though some people outsmarted him. They wrote their names on the tickets, thus making life much easier. After this it was time to start the Scavenger Hunt. While there were only three teams this year, they were bigger then in previous years. There were also more physical/photo options, thus making it truly a fun time.',
      'The last main part of the party.... the Door Prize Raffle. This year there were some really awesome prizes. From DVD Players to a brand new Dell. Truly one of the better OMP prize table in history.',
      'The last bit of news... there are now only four people who have been to every single OMP. Are they addicted? Crazy? or just dedicated? You decided. They are : Pendras, Sorcha, Tensor and Vryce. Who will the next one off the list?'
    ],
    photoCredits: ['Dalandra', 'Flair', 'Alan', 'Aijin', 'Pendras', 'Chewbacon', 'Thoreau', 'Wynn']
  },

  '2003': {
    year: '2003',
    location: 'Pittsburgh, PA',
    dates: 'August',
    stories: [
      'Pittsburgh... What the heck is in Pittsburgh?? Well the OMP, of course.',
      'This year started out the same as the others. People started showing up on Thursday and taking over the hotel. This year we had the best hotel by far. The lobby was not near the rooms, and we were allowed into the conference room early. Thursday was a relatively mild evening. The only bad, well, odd thing about Pittsburgh is that you can\'t just go to a packy (liquor store) or grocery store to buy beer. You must get it from a distributor. Now how weird is that? Skinless found out where to go and saved us all.',
      'On Friday a small group headed to Kennywood. It was a small, family styled park, but lots of fun. A few of us watched a certain Admin and his wife on Aero 360, and we swear we could hear him scream. Friday night was another night of food, drinking and game playing. Seems this year\'s big game of the weekend was Phase 10. Other games on the table that weekend were Fluxx, Settlers of Catan, Articulate, Cranium, Carcassonne, Munchkin, and of course, UNO.',
      'Saturday morning, wow! So hung over, and so many people hung over. But what a big breakfast! Thanks again to the admin for getting us those breakfast buffet tickets. (Tensor & Rastafan take a bow.) Anyways, it was a quite kind of morning, mainly just eating, talking, and trying to wake up.',
      'Dog Punting has returned! Yup, it was back, you missed it. That was another great thing about Pittsburgh: we had a decent sized parking lot to get this off the ground this year. Such fun!',
      'After Punting we went right into the UNO Tourney. Others decided to join in on other games, while a few groups decided to hit the movies and lunch.',
      'On Saturday, at 5pm, The OMP has begun.',
      'Like OMPs in the past all mudders were kicked out of the room to allow us to set things up. Once the doors opened, we had people piling in left and right. This year the registration table had a few new faces on it (or at least people doing new jobs). You were greeted by Pistil and Tensor, given a "Thingie" by Vryce, a ticket or two by Sorcha, your photo snapped by Stalin, and then it was off to see Rastafan & Nanook to buy a t-shirt.',
      'Once everyone was herded through the registration process (which took a full hour), food arrived. Pizza! And *gasp* soda! (Pop for you Michigan people.) And no, no one got lost in this venture. There were also other munchies including gummy bears, chips and dip (shh, don\'t be calling Vraal that), and even a birthday cake for Fiona (Happy Birthday!). Oh yes, we can\'t forget those Goodberries (Hugs and Kisses) from the priests.',
      'Once the pizza was gone and everyone was full, Tensor laid down the law of the Scavenger Hunt! He gave out the rules, the cameras, and the lists. Then the teams dispersed. Those of us who did not go on the Hunt sat around talking and gaming. Rastafan and his group were playing Phase 10, another group was playing Fluxx, another was playing Settlers, and I\'m sure there were more out there.',
      'The Hunt is over, and the winners have been awarded the points given out. Now is what everyone has been waiting for: the raffle. There were so many door prizes this year, everyone left with something. And yes, the Admission Marbles were raffled off again. How could we break that sacred tradition?',
      'It was an extremely long OMP this year. I think we finally wrapped it all up around 12:30/1am. Once it was all done, people went back to their rooms or outside to smoke, and a few stayed in the lobby.'
    ],
    photoCredits: ['Tensor', 'Adalius', 'Haplo', 'Kishpa', 'Permas', 'Nessa', 'Pendras', 'Fiona', 'Rama', 'Aijin', 'Valletta']
  },

  '2002': {
    year: '2002',
    location: 'Baltimore, MD',
    dates: 'August',
    stories: [
      'Another year, another OMP. This year started like any other OMP. People gathering in the lobby trying to find their friends. Of course the hotel wasn\'t too happy about this and tried, unsuccessfully, to get us to go into a meeting room. But well you can\'t break a creator of habit, so the lobby won.',
      'Friday afternoon as people can wandering in a small group decided to head to Burke\'s Cafe, a local bar/restaurant. Little did we know there was a handful on site drinking and eating. Even our friends from Ireland, Druss and Sadness, joined in for some American cuisine.',
      'A few people headed over to the to see the National Aquarium to see the dolphin show and the fishes. Everyone had a good time there, well except for Skinless. I\'ve also heard that a group of about 20 or so headed over to the Eastern House for dinner around this time. Boy Baltimore must be glad we are gone already.',
      'One of the highlights for Friday night was the trip to Edgar\'s. Imagine if you can about 35 mudders all walking down the street following Rastafan. Then these same people all filing into a pool hall. I remember hearing one person in the bar/pool hall say "Oh sh*t" as we came walking in.',
      'There were more activities for Friday night, mostly drinking, gaming and *gasp* a few people mudded.',
      'Saturday, the day we all came to Baltimore for, the OMP. The day started as your typical Saturday, but it was not to stay that way.',
      'Around 2:00pm the Uno Tourney was started upstairs in the meeting room. Things were going great. Had a few people playing other games and even Groosh teaching a few people how to play MahJong. Pendras even brought his Gamecube and let people use it. Then it started, the fire alarms. The first alarm sounded about 4:30pm, everyone who was in the meeting room rushed to the exit, which couldn\'t be found. Next you hear Rastafan yell "We are all gonna die!". Believe it or not no one died, even though we did have to walk down thirteen flights of stairs. The next hour was spent with all of us gathering in the lobby waiting to be let back upstairs. After this every time a fire alarm would sound, which they did about five more times that night, someone would call downstairs and ask if it was a real fire or a false alarm. Luckily they were all false alarms.',
      'Soon we were all back in the room and we were getting ready to start the registration table. This year we decided to get Tensor. As you all know, at least you should know, Tensor hates AOL. So as a special entrance \'fee\', everyone presented Tensor with an AOL CD. Needless to say there were over 100 of these by the time the registration process was over.',
      'After the registration process was complete we dove right into the pizza and soda, don\'t ask Rastafan or Tensor about this. Needless to say most of the pizza was gone by the time the soda\'s showed up.',
      'The hunt! We didn\'t waste any time jumping into the hunt this year. We did a lot of changes. For one a few items were listed on the mud a few days before the OMP. This gave a few a chance to bring those items with them. (Which not everyone had!) Also we decided to make the hunt more physical.',
      'Once the hunt was completed we started the raffle. This year everyone walked away with something. Also how can we forget the Admission Marbles from the first OMP.',
      'Over all the OMP this year was a lot of fun. After the official part of the party was over almost everyone stayed in the conference room. From what I heard they were still there at 6am the next morning. This year was one of the \'closest\' OMP\'s to date. What I mean is everyone pretty much hung out together. You didn\'t have a bunch of little groups doing their own thing.',
      'If you have anything you would like to add to this page please mudmail Vryce. Until next year, take care.'
    ],
    photoCredits: ['Tensor', 'Anya', 'Luci', 'Jamil', 'Adalius', 'Solo', 'Sadness']
  },

  '2001': {
    year: '2001',
    location: 'Las Vegas, NV',
    dates: 'June',
    stories: [
      'From around the states, along with a few straggler from the UK, Australia and Canada, we invaded The Orleans in Vegas. Unlike past years there was no central meeting place, but that didn\'t stop us from finding one another and enjoying our \'mudder\' ways.',
      'Thursday night was mainly the night for meeting up, drinking, gambling... in general hanging out.',
      'Friday started with a small group heading to Hoover Dam, one of the seven man made wonders of the world. While those few were getting educated an even larger group headed off to see Tomb Raider. Friday night approximately twenty four mudders gathered together to go to the Tournament of Kings at the Excalibur Hotel. Just imagine twenty mudders all sitting together rooting for their team, which was Ireland btw. All laughing, drinking, eating without forks or knifes and pounding on the table when their man was competing. (We won\'t mention that the other four or so sat somewhere else, thus having a different team to cheer for.) Go Ireland! While others went back to the hotel after the show others headed off to the New York New York hotel to ride the Manhattan Express. After that hair thrilling ride the few who could stomach it headed over to the Stratosphere to ride the worlds highest roller coaster, The High Roller. A whooping 112 stories up.',
      'Saturday, the big day. The day everyone came to Vegas for. The OMP. While most were taking it easy after a long night, well morning, of drinking, a few brave souls decided to test their luck in the casino. While others just walked around. About 2pm about twenty or so mudders headed up to the meeting room to find out once again, who is the top UNO Player. After the Uno Tourney we went full swing into the OMP itself. You had Nanook there checking everyone in who passed through the doors, while Sorcha gave out the raffle tickets and finally Tensor there testing out his new camera getting shots of everyone. Last stop on this wonderful entrance was the shirt and hat table. Where Rastafan was peddling the goods. Once everyone was in and settled we went right into the Scavenger Hunt.',
      'Once the hunt was over and the teams tallied we started on the door prizes. This year someone, thoughtfully, brought about 50 pounds of Starbucks coffee. (Just what every mudder needs on those late night exp romps.) We also, once again, raffled off the coveted Admission Marbles from the first OMP.',
      'Once all the door prizes were given out, the admin were presented with a rare surprise. For their dedication to the mud and providing us with what we call \'home\', they were each presented with a baseball cap. Each stitched with their names on the back and "3K" and a dragon on the front.',
      'Now that all the prizes were given out onto the big games. Being we were in Las Vegas, we might as well play the part. This year players could take a portion of their exp or quest points and try to win more playing Blackjack. Some players did fairly well with our biggest winner netting almost 8 mil exp. Our biggest quest point winner took home an additional 600 qp\'s. But while there are winners, there are losers. And trust us, with Tensor, Rastafan and Pistil (not to forget Nooster who stepped in there for a few rounds) dealing, there were plenty of losers.',
      'After the Official OMP there were the un-official parties, like always. There was even a rumor that someone ordered ladies of the night. Of course, we can\'t substantiate any of that.',
      'Over all it was a great weekend for all. Much to do and see. And plenty of food on those buffets.'
    ],
    photoCredits: ['Tensor', 'Kishpa', 'Vryce', 'Miette', 'Gelfry', 'Ghostrider', 'Aliena', 'Gaffman', 'Eriond', 'Chuckle']
  },

  '2000': {
    year: '2000',
    location: 'Cincinnati, OH',
    dates: 'July',
    stories: [
      'Once again, mudders from all over took over the lobby of a hotel. This year\'s victim was the Radisson Hotel at the Cincinnati Airport. At almost any given time you could find a tired, weary eyed mudder looking for someone to talk with. (And I\'m sure the other guests enjoyed hearing about our "killing" ways.)',
      'Friday night there were a variety of unofficial activities going throughout the wee hours of the morning. From trips to to local bars, catching the opening screening of X-Men, heading down to Kentucky to an infamous Cletus Drunkenfest to hanging out at the hotel getting to know each other.',
      'Saturday started off with dog punting on the back lawn. People gathered around to see who could punt the dog, or other stuffed animal, the farthest. Unfortunately the dog was the least to get punted. As everyone decided that the sheep was more appropriate. We don\'t know how, but Ropmas gets our special kick award. For he managed to get the poor little bear stuck on the roof. From there we moved indoors for the Uno Tourney. This year we had thirty wide eyed Uno hungry participants. Everyone who joined in played their hearts out, but there can be only one true Uno champ.',
      'About 5:30PM the main party started. Everyone lined up outside the room so that they could walk by the registration table. The players had a great time returning marbles to Peeron that they all apparently found. Thus adding to his Marble collection. Peeron also introduced to us Marbozo. After Marbozo dinner arrived, pizza and pop for everyone. And something that was needed before the main event of the party, the Scavenger Hunt. While the teams ran around looking for hunt items the few that stayed behind enjoyed themselves playing Uno or Articulate. (Little bit of advice here, if you sit next to Tensor in Uno, he just loves getting Draw 4\'s, Draw 2\'s and Skips.) The Official Party winded down with the raffle. Many great prizes were on hand, from t-shirts to a giant long sword. Also who can forget the coveted Admission Marbles from the first OMP. They made their way back again this year, and got raffled off to one lucky winner.',
      'Over all it was a fun weekend for all. Many new faces attended this year, along with many of the old. We also had a few new events, and hopefully they will become a permanent addition to the OMP\'s.'
    ],
    photoCredits: ['Bshadowl', 'Acidviper', 'Cylet', 'Dynon', 'Ladydeath', 'Jygro', 'Crolack', 'Randi', 'Jander', 'Defina', 'Gelfry']
  },

  '1999': {
    year: '1999',
    location: 'Chicago, IL',
    dates: 'July',
    activities: [
      'Historic Palmer House exploration',
      'Downtown Chicago sightseeing',
      'Navy Pier visit',
      'Lake Michigan activities'
    ],
    stories: [
      'Mudders from all over the world, rejoined for the second annual OMP in Northbrook, IL at the Raddison Hotel. Held on the weekend of July 20-21st, the 3K OMP involved over 150 people, from players to wizards and their friends who showed up to enjoy the festivites. For many of these people, they had only know each other via the text based MUD, and for others it was a reunion, of sorts, from the previous year.'
      'The night\'s entertainment consisted of games, such as a scavenger hunt, door prize raffle, an UNO Tourney and ended with a belly dance from our own Haplo. And who could forget Rastafan wearing the rub glove on his head yelling, "I\'m a squid."',
      'Prizes from the games and raffles ranged from quest points to lava lamps and the famed jar of marbles from the 1st OMP.',
      'Minor door prizes: Stuffed dogs for punting, Lava lamps, Electronic UNO games, Various books, OMP T-shirts', 
      'Major Door Prizes: Nintendo 64 System, The Offical Admission Marbles from the First OMP',
      'Game Winners: UNO Tournament - Malk, Jamil, Zoicite',
      'Game Winners: Scavenger Hunt - Shadow, Tigereyes, Vryce'
    ],
    photoCredits: ['Rouille', 'Malaclypse', 'Unique', 'Aliena']
  },

  '1998': {
    year: '1998',
    location: 'Fairfax, VA',
    dates: 'June 20-21, 1998',
    venue: {
      name: 'Comfort Inn',
      address: 'Fairfax, VA'
    },
    stories: [
      'Mudders from all over the world converged at the Comfort Inn, in Fairfax, VA for the first Three Kingdoms Official Mud Party. Held on the weekend of June 20-21st, the 3K OMP involved over 150 people, from players to wizards and their friends who showed up to enjoy the festivities. For many of these people, they had only know each other via the text based MUD, and so meeting each other face to face was quite a joy (or surprise).',
      'The night\'s entertainment consisted of games, such as a scavenger hunt and a word puzzles, to a prize raffle and a "best buns" competion, judged by the ladies. Prizes from the games and raffles ranged from bonus stats and quest points to a zip drive and free games.',
      'A good time was had by all, and already plans are being laid for the second 3K Official Mud Party ... keep July 1999 open, and stay tuned!',
      'Several prizes were earned and won during the night. From take-home door prizes, donate by players and wizards such as a Zip drive, to T-shirts, to Mud-based awards.',
      'Minor door prizes: Wyrd, Malk, Tuesdai, Cheyenne, Kinslayer, Spathi,Crusher, Lovecraft, Arkeen, Donovan, Alika,Faerl, Kramer,Rastafan, Janina, Calvin, Guest1, Cerberus, Zarine, Sikk,Talamon, Blythe,Fortunato, Ladydeath, Kellori, George,Jamil, Bianca, Stilgar, Quick, Faze',
      'Major Door Prizes: Paperback Wheel of Time Series: Phantasy, Hardback Wheel of Time Series: Vraal, Witch Globe: Taffy, Pure Silver Cross: Herzog, The Official Tensor (tm) Lamp: Dreamer, Blockbuster Gift Certificates: Pain, Shadowspawn, Rakk, Zaretal, Vermillion, Dagger: Mickey, The Official Admission Marbles: Frogurt, The Guest Signature Lists including the special Western quest hint: Waytu, The "real" art (a framed painting by "some guy" as Tensor put it): Wylikat',
      'Games Winners: Word Scramble - Vryce, Arkeen, Donovan, Kilbane, Ravill Starflame, Mickey, Arawn, Kitila',
      'Game Winners: Find the Character - William, Wylikat, Dreamer, Laur, Arawn',
      'Game Winners: Scavenger Hunt - Relkin, Kilbaine, Arkeen, Donovan, Ravill, Waytu, Crolack, Javneh, Tuesdai, Frogurt, Vryce, Groosh, Riptide, Demonspawn, Xanth, Tsornin, Odyssey',
      'Special Contests: Best Buns - Tranzic. Imported from Sweden, this blonde charmer wiggled and bounced for the judges. Rumour has it that other PKers now have a bounty on his butt, not just his head.'
    ],
    photoCredits: ['Geba', 'Arkeen', 'Ladydeath', 'Janina', 'Quizzle', 'Crolack']
  }
};

// DOM Elements
const modal = document.getElementById('ompModal');
const modalYear = modal?.querySelector('.modal-year');
const modalLocation = modal?.querySelector('.modal-location');
const modalDates = modal?.querySelector('.modal-dates');
const modalBody = modal?.querySelector('.omp-modal-body');
const closeBtn = modal?.querySelector('.omp-modal-close');

/**
 * Helper function to render data as list or paragraph
 * If data is an array, renders as <ul><li>...</li></ul>
 * If data is a string, renders as <p>...</p>
 */
function renderListOrParagraph(data, label = null) {
  if (Array.isArray(data)) {
    const labelHTML = label ? `<p><strong>${label}</strong></p>` : '';
    return `${labelHTML}<ul>${data.map(item => `<li>${item}</li>`).join('')}</ul>`;
  } else {
    return label ? `<p><strong>${label}</strong> ${data}</p>` : `<p>${data}</p>`;
  }
}

/**
 * Open modal with OMP data
 */
function openModal(ompId) {
  const data = ompData[ompId];
  if (!data || !modal) return;

  // Populate header
  let yearText = data.year;
  if (data.season) {
    yearText += ` - ${data.season}`;
  }
  modalYear.textContent = yearText;
  modalLocation.textContent = data.location;
  modalDates.textContent = data.dates;

  // Build modal body content
  let bodyHTML = '';

  // Venue section
  if (data.venue) {
    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-location-dot"></i> Venue</h3>
        <div class="venue-info">
          <p><strong>${data.venue.name}</strong></p>
          <p>${data.venue.address}</p>
          ${data.venue.phone ? `<p><i class="fa-solid fa-phone"></i> ${data.venue.phone}</p>` : ''}
        </div>
    `;

    // Booking details (for upcoming/future OMPs)
    if (data.venue.groupName || data.venue.roomRate || data.venue.coverCharge) {
      bodyHTML += `<div class="venue-booking">`;

      if (data.venue.groupName) {
        bodyHTML += `<p><strong>Reserve under:</strong> ${data.venue.groupName}</p>`;
      }
      if (data.venue.roomRate) {
        bodyHTML += `<p><strong>Room Rate:</strong> ${data.venue.roomRate}</p>`;
      }
      if (data.venue.amenities) {
        const amenitiesText = Array.isArray(data.venue.amenities) ? data.venue.amenities.join(', ') : data.venue.amenities;
        bodyHTML += `<p><strong>Includes:</strong> ${amenitiesText}</p>`;
      }
      if (data.venue.coverCharge) {
        bodyHTML += renderListOrParagraph(data.venue.coverCharge, 'OMP Cover Charge:');
      }
      if (data.venue.bookingDeadline) {
        bodyHTML += `<p class="booking-deadline"><i class="fa-solid fa-clock"></i> Book by: ${data.venue.bookingDeadline}</p>`;
      }

      bodyHTML += `</div>`;
    }

    bodyHTML += `</div>`;
  }

  // Rideshare section (for upcoming OMPs)
  if (data.showRideshare) {
    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-car"></i> Rideshare Coordination</h3>
        <div class="rideshare-info">
          <p>Need a ride from the airport or want to carpool? Coordinate with other attendees!</p>
          <p class="rideshare-command">Type <code>rideshare</code> in the OMP room on 3K to connect with others.</p>
        </div>
      </div>
    `;
  }

  // Schedule section (if available)
  if (data.schedule) {
    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-calendar-days"></i> Schedule</h3>
        <div class="modal-schedule">
    `;

    if (data.schedule.thursday) {
      bodyHTML += `
        <div class="schedule-day">
          <h4>Thursday</h4>
          ${renderListOrParagraph(data.schedule.thursday)}
        </div>
      `;
    }
    if (data.schedule.friday) {
      bodyHTML += `
        <div class="schedule-day">
          <h4>Friday</h4>
          ${renderListOrParagraph(data.schedule.friday)}
        </div>
      `;
    }
    if (data.schedule.saturday) {
      bodyHTML += `
        <div class="schedule-day">
          <h4>Saturday</h4>
          ${renderListOrParagraph(data.schedule.saturday)}
        </div>
      `;
    }
    if (data.schedule.sunday) {
      bodyHTML += `
        <div class="schedule-day">
          <h4>Sunday</h4>
          ${renderListOrParagraph(data.schedule.sunday)}
        </div>
      `;
    }

    bodyHTML += `
        </div>
      </div>
    `;
  }

  // Activities section
  // Show if no schedule, OR if activities contain detailed content (long text indicates explanatory content)
  if (data.activities && data.activities.length > 0) {
    const hasDetailedActivities = data.activities.some(activity => activity.length > 100);

    if (!data.schedule || hasDetailedActivities) {
      const sectionTitle = hasDetailedActivities ? 'About This Event' : 'Activities';
      const sectionIcon = hasDetailedActivities ? 'fa-circle-info' : 'fa-calendar-check';

      bodyHTML += `
        <div class="modal-section">
          <h3><i class="fa-solid ${sectionIcon}"></i> ${sectionTitle}</h3>
      `;

      if (hasDetailedActivities) {
        // Use paragraphs for detailed explanatory content
        bodyHTML += `
          <div class="modal-about">
            ${data.activities.map(activity => `<p>${activity}</p>`).join('')}
          </div>
        `;
      } else {
        // Use list for short activity items
        bodyHTML += `
          <ul>
            ${data.activities.map(activity => `<li>${activity}</li>`).join('')}
          </ul>
        `;
      }

      bodyHTML += `</div>`;
    }
  }

  // Stories/Memories section
  if (data.stories) {
    let storiesHTML = '';
    if (Array.isArray(data.stories)) {
      // Array of paragraphs
      storiesHTML = data.stories.map(p => `<p>${p}</p>`).join('');
    } else {
      // Single string
      storiesHTML = `<p>${data.stories}</p>`;
    }

    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-book-open"></i> Memories</h3>
        <div class="modal-story">
          ${storiesHTML}
        </div>
      </div>
    `;
  }

  // Photo credits section
  if (data.photoCredits && data.photoCredits.length > 0) {
    bodyHTML += `
      <div class="modal-section modal-credits">
        <p><i class="fa-solid fa-camera"></i> Photos contributed by: ${data.photoCredits.join(', ')}</p>
      </div>
    `;
  }

  modalBody.innerHTML = bodyHTML;

  // Show modal
  modal.classList.add('active');
  document.body.style.overflow = 'hidden';

  // Focus trap for accessibility
  closeBtn?.focus();
}

/**
 * Close modal
 */
function closeModal() {
  if (!modal) return;
  modal.classList.remove('active');
  document.body.style.overflow = '';
}

/**
 * Generate timeline HTML from ompData
 */
function generateTimeline() {
  const timelineContainer = document.getElementById('omp-timeline');
  if (!timelineContainer) return;

  // Get all OMP keys and sort them (newest first)
  const ompKeys = Object.keys(ompData).sort((a, b) => {
    // Extract year for sorting (handle "2011-spring", "2011-summer" etc.)
    const yearA = parseInt(a.split('-')[0]);
    const yearB = parseInt(b.split('-')[0]);

    if (yearA !== yearB) return yearB - yearA; // Descending by year

    // If same year, sort by season (summer before spring alphabetically reversed)
    if (a.includes('-') && b.includes('-')) {
      return a < b ? 1 : -1; // "summer" comes before "spring"
    }

    return a.includes('-') ? -1 : 1;
  });

  let timelineHTML = '';

  ompKeys.forEach((key, index) => {
    const data = ompData[key];
    const isFirst = key === '1998'; // Mark the first gathering
    const isLast = index === ompKeys.length - 1;

    // Build timeline item classes
    let itemClasses = 'timeline-item';
    if (isFirst || isLast) itemClasses += ' timeline-item-first';

    // Build the description line (dates at venue)
    let description = data.dates;
    if (data.venue && data.venue.name) {
      description += ` at ${data.venue.name}`;
    }

    timelineHTML += `
      <div class="${itemClasses}" data-omp="${key}">
        <div class="timeline-marker"></div>
        <div class="timeline-content">
          <span class="timeline-year">${data.year}</span>
          ${data.season ? `<span class="timeline-season">${data.season}</span>` : ''}
          ${isFirst ? '<span class="timeline-milestone">The First Gathering</span>' : ''}
          <h3>${data.location}</h3>
          <p>${description}</p>
        </div>
      </div>
    `;
  });

  timelineContainer.innerHTML = timelineHTML;
}

/**
 * Initialize event listeners
 */
function initOMP() {
  // Generate timeline from data
  generateTimeline();

  // Timeline item clicks
  const timelineItems = document.querySelectorAll('.timeline-item[data-omp]');
  timelineItems.forEach(item => {
    item.addEventListener('click', () => {
      const ompId = item.dataset.omp;
      openModal(ompId);
    });

    // Keyboard accessibility
    item.setAttribute('tabindex', '0');
    item.setAttribute('role', 'button');
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const ompId = item.dataset.omp;
        openModal(ompId);
      }
    });
  });

  // Close button
  closeBtn?.addEventListener('click', closeModal);

  // Click outside to close
  modal?.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  // Escape key to close
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal?.classList.contains('active')) {
      closeModal();
    }
  });
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initOMP);
} else {
  initOMP();
}
