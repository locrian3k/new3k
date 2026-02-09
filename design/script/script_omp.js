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
      groupName: '3Kingdoms OMP 2026',
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
    activities: [],
    stories: 'The Windy City welcomed adventurers once again for a weekend of reconnecting with old friends and making new memories. Chicago proved to be a perennial favorite location for the community.',
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
    dates: 'July 30 - August 1, 2010',
    venue: {
      name: "Crowne Plaza Chicago O'Hare",
      address: '5440 N River Rd, Rosemont, IL 60018'
    },
    activities: [
      'Deep dish pizza pilgrimages',
      'Chicago skyline sightseeing',
      'Hotel suite parties',
      'MUD gaming marathons'
    ],
    stories: "Chicago's convenient central location and excellent amenities made it a favorite destination. The Crowne Plaza O'Hare provided easy access for travelers flying in from across the country.",
    photoCredits: ['Cherek']
  },

  '2009': {
    year: '2009',
    location: 'Romulus, MI',
    dates: 'July 31 - August 2, 2009',
    venue: {
      name: 'Crowne Plaza Detroit Metro Airport',
      address: '8000 Merriman Road, Romulus, MI 48174'
    },
    activities: [
      'Detroit area exploration',
      'Automotive heritage tours',
      'Traditional OMP activities',
      'Community bonding sessions'
    ],
    stories: 'Near the Detroit Metro Airport, players gathered for another Michigan meetup. The accessible location made it easy for adventurers to fly in from across North America.',
    photoCredits: ['Cherek']
  },

  '2008': {
    year: '2008',
    location: 'Indianapolis, IN',
    dates: 'August 1-3, 2008',
    venue: {
      name: 'Crowne Plaza Indianapolis Airport',
      address: '2501 S High School Rd, Indianapolis, IN 46241'
    },
    activities: [
      'Indianapolis Motor Speedway area',
      'Downtown Indianapolis exploration',
      'Hoosier hospitality experiences',
      'Gaming and socializing'
    ],
    stories: 'The Crossroads of America lived up to its name, providing a central meeting point for players from all directions. Indianapolis offered a perfect blend of attractions and Midwestern hospitality.',
    photoCredits: ['Cherek']
  },

  '2007': {
    year: '2007',
    location: 'Chicago, IL',
    dates: 'August 3-5, 2007',
    venue: {
      name: "Crowne Plaza Chicago O'Hare",
      address: '5440 N River Rd, Rosemont, IL 60018'
    },
    schedule: {
      friday: [
        'Check-in and meet & greet',
        'Dinner at Claim Jumper (7:30 PM)',
        'Late night socializing'
      ],
      saturday: [
        'Breakfast at hotel',
        'Open activities and exploration',
        'Group dinner',
        'Evening festivities'
      ],
      sunday: [
        'Farewell breakfast',
        'Check-out and departures'
      ]
    },
    activities: [
      'Dinner at Claim Jumper restaurant',
      'Chicago-style dining',
      'Gaming tournaments',
      'Community celebrations'
    ],
    stories: 'Another successful Chicago gathering brought the community together in the Windy City. The familiar venue and vibrant city provided the perfect backdrop for another memorable OMP.',
    photoCredits: ['Cherek', 'Hanse']
  },

  '2006': {
    year: '2006',
    location: 'Williamsburg, VA',
    dates: 'August 4-6, 2006',
    venue: {
      name: 'Crowne Plaza Williamsburg at Fort Magruder',
      address: '6945 Pocahontas Trail, Williamsburg, VA 23185'
    },
    schedule: {
      friday: [
        'Check-in and registration',
        'Meet & greet in hospitality suite',
        'Evening socializing'
      ],
      saturday: [
        'Busch Gardens trip (optional)',
        'Colonial Williamsburg exploration (optional)',
        'Water Country USA (optional)',
        'Group dinner and festivities'
      ],
      sunday: [
        'Farewell gathering',
        'Check-out'
      ]
    },
    activities: [
      'Busch Gardens theme park trip',
      'Colonial Williamsburg historic tours',
      'Water Country USA water park',
      'Evening social gatherings'
    ],
    stories: 'Historic Williamsburg provided a unique and memorable backdrop for the gathering. With options ranging from roller coasters at Busch Gardens to stepping back in time at Colonial Williamsburg, there was something for everyone.',
    photoCredits: ['Cherek']
  },

  '2005': {
    year: '2005',
    location: 'Romulus, MI',
    dates: 'August 5-7, 2005',
    venue: {
      name: 'Crowne Plaza Detroit Metro Airport',
      address: '8000 Merriman Rd, Romulus, MI 48174'
    },
    schedule: {
      friday: [
        'Check-in begins',
        'Pizza party in suite (evening)',
        'Socializing and gaming'
      ],
      saturday: [
        'Henry Ford Museum / Greenfield Village trip',
        'Downtown Detroit exploration (optional)',
        'Group dinner',
        'Evening activities'
      ],
      sunday: [
        'Farewell breakfast',
        'Departures'
      ]
    },
    activities: [
      'Henry Ford Museum visit',
      'Greenfield Village exploration',
      'Pizza party',
      'Detroit area sightseeing'
    ],
    stories: 'Michigan hosted the community once again, with the Detroit area providing plenty of attractions. The Henry Ford Museum and Greenfield Village offered a fascinating glimpse into American history and innovation.',
    photoCredits: ['Cherek', 'Elfstone', 'Hanse']
  },

  '2004': {
    year: '2004',
    location: 'St. Louis, MO',
    dates: 'August 6-8, 2004',
    venue: {
      name: 'Crowne Plaza St. Louis Airport',
      address: '11228 Lone Eagle Dr, Bridgeton, MO 63044'
    },
    schedule: {
      friday: [
        'Check-in and hospitality suite opens',
        'Gateway Arch visit (optional)',
        'Dinner at Trainwreck Saloon (6:30 PM)',
        'Evening socializing'
      ],
      saturday: [
        'Six Flags St. Louis trip',
        'Cardinals vs Cubs baseball game (evening)',
        'Late night gathering'
      ],
      sunday: [
        'Farewell brunch',
        'Departures'
      ]
    },
    activities: [
      'Gateway Arch sightseeing',
      'Six Flags St. Louis theme park',
      'Cardinals vs Cubs baseball game',
      'Dinner at Trainwreck Saloon'
    ],
    stories: 'The Gateway to the West opened its arms to welcome 3K adventurers. Highlights included a thrilling day at Six Flags and catching the classic Cardinals vs Cubs rivalry at Busch Stadium.',
    photoCredits: ['Cherek', 'Elfstone', 'Hanse']
  },

  '2003': {
    year: '2003',
    location: 'Pittsburgh, PA',
    dates: 'August 1-3, 2003',
    venue: {
      name: 'Crowne Plaza Pittsburgh South',
      address: '164 Fort Couch Rd, Pittsburgh, PA 15241'
    },
    schedule: {
      friday: [
        'Check-in and meet & greet',
        'Hospitality suite opens',
        'Evening socializing'
      ],
      saturday: [
        'Kennywood Amusement Park trip',
        'Pittsburgh sightseeing (optional)',
        'Group dinner',
        'Evening festivities'
      ],
      sunday: [
        'Farewell breakfast',
        'Departures'
      ]
    },
    activities: [
      'Kennywood Amusement Park visit',
      'Pittsburgh sightseeing',
      'Three Rivers exploration',
      'Traditional OMP festivities'
    ],
    stories: "The Steel City forged new bonds among community members. Kennywood Amusement Park, one of America's classic traditional parks, provided thrills and nostalgia for attendees.",
    photoCredits: ['Elfstone', 'Hanse']
  },

  '2002': {
    year: '2002',
    location: 'Baltimore, MD',
    dates: 'August 2-4, 2002',
    venue: {
      name: "Marriott's Hunt Valley Inn",
      address: '245 Shawan Rd, Hunt Valley, MD 21031'
    },
    schedule: {
      friday: [
        'Check-in and registration',
        'Hospitality suite gathering',
        'Dinner at nearby restaurant',
        'Evening socializing'
      ],
      saturday: [
        'Inner Harbor trip',
        'National Aquarium visit',
        'Maryland crab feast dinner',
        'Evening activities'
      ],
      sunday: [
        'Farewell brunch',
        'Departures'
      ]
    },
    activities: [
      'Baltimore Inner Harbor visit',
      'National Aquarium tour',
      'Maryland crab feast',
      'Community celebrations'
    ],
    stories: "Charm City lived up to its name, charming visitors with its waterfront attractions and famous Maryland blue crabs. The Inner Harbor and National Aquarium were popular destinations for the group.",
    photoCredits: ['Elfstone', 'Hanse']
  },

  '2001': {
    year: '2001',
    location: 'Las Vegas, NV',
    dates: 'August 3-5, 2001',
    venue: {
      name: 'Imperial Palace Hotel & Casino',
      address: '3535 Las Vegas Blvd S, Las Vegas, NV 89109'
    },
    schedule: {
      friday: [
        'Check-in at Imperial Palace',
        'Strip exploration',
        'Group dinner',
        'Casino and shows'
      ],
      saturday: [
        'Pool party',
        'Las Vegas attractions',
        'Group dinner',
        'Evening entertainment'
      ],
      sunday: [
        'Farewell breakfast',
        'Departures'
      ]
    },
    activities: [
      'Las Vegas Strip exploration',
      'Casino gaming',
      'Pool parties',
      'World-class dining and shows'
    ],
    stories: 'Sin City provided an unforgettable setting for one of the most legendary OMPs. Right on the Las Vegas Strip, the Imperial Palace put attendees in the heart of all the action. What happened at OMP Vegas... well, the memories live on.',
    photoCredits: ['Elfstone', 'Hanse']
  },

  '2000': {
    year: '2000',
    location: 'Cincinnati, OH',
    dates: 'August 4-6, 2000',
    venue: {
      name: 'Kings Island Resort (area hotel)',
      address: 'Mason, OH (near Kings Island)'
    },
    schedule: {
      friday: [
        'Check-in and meet & greet',
        'Hospitality suite opens',
        'Evening socializing'
      ],
      saturday: [
        "Paramount's Kings Island theme park all day",
        'Evening gathering and dinner'
      ],
      sunday: [
        'Farewell breakfast',
        'Departures'
      ]
    },
    activities: [
      "Paramount's Kings Island theme park",
      'Roller coaster adventures',
      'Cincinnati chili sampling',
      'Millennium celebrations'
    ],
    stories: "As the new millennium began, the community gathered near Cincinnati's famous theme park. Roller coasters and shared adventures created memories that would last for years to come. The Beast and Son of Beast were particular highlights.",
    photoCredits: ['Elfstone']
  },

  '1999': {
    year: '1999',
    location: 'Chicago, IL',
    dates: 'August 6-8, 1999',
    venue: {
      name: 'The Palmer House Hilton',
      address: '17 E Monroe St, Chicago, IL 60603'
    },
    schedule: {
      friday: [
        'Check-in at historic Palmer House',
        'Hospitality suite opens',
        'Downtown Chicago exploration',
        'Group dinner'
      ],
      saturday: [
        'Chicago sightseeing',
        'Navy Pier (optional)',
        'Group activities',
        'Evening festivities'
      ],
      sunday: [
        'Farewell breakfast',
        'Departures'
      ]
    },
    activities: [
      'Historic Palmer House exploration',
      'Downtown Chicago sightseeing',
      'Navy Pier visit',
      'Lake Michigan activities'
    ],
    stories: "The second official gathering took place at the legendary Palmer House Hilton, one of America's oldest and most prestigious hotels. Staying in such a grand historic venue added extra magic to the weekend. Chicago's grandeur matched the growing ambitions of the community.",
    photoCredits: ['Elfstone']
  },

  '1998': {
    year: '1998',
    location: 'Washington, DC',
    dates: 'August 7-9, 1998',
    venue: {
      name: 'Quality Hotel & Suites',
      address: 'College Park/Beltsville, MD area'
    },
    schedule: {
      friday: [
        'Check-in and first meetings',
        'Hospitality suite opens',
        'Initial gathering - putting faces to names'
      ],
      saturday: [
        'National Mall exploration',
        'Smithsonian museums',
        'Washington monuments',
        'Group dinner and celebration'
      ],
      sunday: [
        'Farewell gathering',
        'Departures and promises to return'
      ]
    },
    activities: [
      'National Mall exploration',
      'Smithsonian museum visits',
      'Washington Monument and memorials',
      'The historic first gathering of 3K players'
    ],
    stories: "Where it all began. The nation's capital hosted the very first Official MUD Party, bringing together players who had only known each other through text on a screen. For the first time, adventurers could put faces to the names they had quested alongside for years. This historic gathering established the tradition that would continue for over a decade. The excitement of finally meeting online friends in person was palpable, and lifelong friendships were forged that weekend.",
    photoCredits: ['Elfstone']
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
    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-book-open"></i> Memories</h3>
        <div class="modal-story">
          <p>${data.stories}</p>
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
