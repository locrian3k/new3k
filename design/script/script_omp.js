/**
 * OMP (Official MUD Party) Page Scripts
 * Handles timeline interactions and modal displays
 */

// OMP Data - Historical information for each gathering
const ompData = {
  '2013': {
    year: '2013',
    location: 'Chicago, IL',
    dates: 'August 2-4, 2013',
    venue: {
      name: 'Hampton Inn & Suites Chicago North Shore/Skokie',
      address: '5201 Old Orchard Rd, Skokie, IL 60077'
    },
    activities: [
      'Group dinners at local restaurants',
      'Gaming sessions and LAN parties',
      'Exploring Chicago attractions',
      'Traditional 3K trivia competition'
    ],
    stories: 'The Windy City welcomed adventurers once again for a weekend of reconnecting with old friends and making new memories. Chicago proved to be a perennial favorite location for the community.'
  },

  '2012': {
    year: '2012',
    location: 'Lansing, MI',
    dates: 'August 3-5, 2012',
    venue: {
      name: 'Causeway Bay Hotel',
      address: '6820 S Cedar St, Lansing, MI 48911'
    },
    activities: [
      'Hotel hospitality suite gatherings',
      'Local restaurant excursions',
      'Gaming tournaments',
      'Late-night conversation sessions'
    ],
    stories: "Michigan's capital city hosted a memorable gathering where players from across the continent came together. The Causeway Bay provided an excellent home base for the weekend's festivities."
  },

  '2011-summer': {
    year: '2011',
    season: 'Summer',
    location: 'Philadelphia, PA',
    dates: 'August 5-7, 2011',
    venue: {
      name: 'Crowne Plaza Philadelphia - Cherry Hill',
      address: 'Cherry Hill, NJ (Philadelphia area)'
    },
    activities: [
      'Historic Philadelphia tours',
      'Group dinners in the city',
      'Hotel suite socializing',
      'Classic 3K gaming sessions'
    ],
    stories: 'The City of Brotherly Love extended its warm welcome to the 3K community. Players explored the rich history of Philadelphia while creating new memories of their own.'
  },

  '2011-spring': {
    year: '2011',
    season: 'Spring',
    location: 'San Jose, CA',
    dates: 'April 29 - May 1, 2011',
    venue: {
      name: 'DoubleTree by Hilton',
      address: 'San Jose, CA'
    },
    activities: [
      'Silicon Valley exploration',
      'West Coast player meetups',
      'Tech industry tours',
      'California cuisine adventures'
    ],
    stories: 'A rare West Coast gathering brought players to the heart of Silicon Valley. This special spring edition allowed West Coast players who usually had to travel far to host their fellow adventurers.'
  },

  '2010': {
    year: '2010',
    location: 'Chicago, IL',
    dates: 'July 30 - August 1, 2010',
    venue: {
      name: "Crowne Plaza Chicago O'Hare",
      address: "5440 N River Rd, Rosemont, IL 60018"
    },
    activities: [
      'Deep dish pizza pilgrimages',
      'Chicago skyline sightseeing',
      'Hotel suite parties',
      'MUD gaming marathons'
    ],
    stories: "Chicago's convenient central location and excellent amenities made it a favorite destination. The Crowne Plaza O'Hare provided easy access for travelers flying in from across the country."
  },

  '2009': {
    year: '2009',
    location: 'Romulus, MI',
    dates: 'July 31 - August 2, 2009',
    venue: {
      name: 'Crowne Plaza Detroit Metro Airport',
      address: 'Romulus, MI (Detroit Metro area)'
    },
    activities: [
      'Detroit area exploration',
      'Automotive heritage tours',
      'Traditional OMP activities',
      'Community bonding sessions'
    ],
    stories: 'Near the Detroit Metro Airport, players gathered for another Michigan meetup. The accessible location made it easy for adventurers to fly in from across North America.'
  },

  '2008': {
    year: '2008',
    location: 'Indianapolis, IN',
    dates: 'August 1-3, 2008',
    venue: {
      name: 'Crowne Plaza Indianapolis',
      address: 'Indianapolis, IN'
    },
    activities: [
      'Indianapolis Motor Speedway visits',
      'Downtown Indianapolis exploration',
      'Hoosier hospitality experiences',
      'Gaming and socializing'
    ],
    stories: 'The Crossroads of America lived up to its name, providing a central meeting point for players from all directions. Indianapolis offered a perfect blend of attractions and Midwestern hospitality.'
  },

  '2007': {
    year: '2007',
    location: 'Chicago, IL',
    dates: 'August 3-5, 2007',
    venue: {
      name: "Crowne Plaza Chicago O'Hare",
      address: "5440 N River Rd, Rosemont, IL 60018"
    },
    activities: [
      'Navy Pier excursions',
      'Chicago-style dining',
      'Gaming tournaments',
      'Community celebrations'
    ],
    stories: 'Another successful Chicago gathering brought the community together in the Windy City. The familiar venue and vibrant city provided the perfect backdrop for another memorable OMP.'
  },

  '2006': {
    year: '2006',
    location: 'Williamsburg, VA',
    dates: 'August 4-6, 2006',
    venue: {
      name: 'Crowne Plaza Williamsburg',
      address: 'Williamsburg, VA'
    },
    activities: [
      'Colonial Williamsburg tours',
      'Busch Gardens visits',
      'Historical reenactment experiences',
      'Evening social gatherings'
    ],
    stories: 'Historic Williamsburg provided a unique and memorable backdrop for the gathering. Players explored Colonial America by day and gathered to share stories of their virtual adventures by night.'
  },

  '2005': {
    year: '2005',
    location: 'Romulus, MI',
    dates: 'August 5-7, 2005',
    venue: {
      name: 'Crowne Plaza Detroit Metro Airport',
      address: 'Romulus, MI'
    },
    activities: [
      'Henry Ford Museum visits',
      'Greenfield Village exploration',
      'Detroit area attractions',
      'Community gatherings'
    ],
    stories: 'Michigan hosted the community once again, with the Detroit area providing plenty of attractions for adventurers to explore between gaming sessions and social events.'
  },

  '2004': {
    year: '2004',
    location: 'St. Louis, MO',
    dates: 'August 6-8, 2004',
    venue: {
      name: 'Crowne Plaza St. Louis',
      address: 'St. Louis, MO'
    },
    activities: [
      'Gateway Arch visits',
      'Mississippi riverfront exploration',
      'Cardinals baseball games',
      'St. Louis BBQ experiences'
    ],
    stories: 'The Gateway to the West opened its arms to welcome 3K adventurers. St. Louis offered iconic American landmarks and warm hospitality to match the community spirit.'
  },

  '2003': {
    year: '2003',
    location: 'Pittsburgh, PA',
    dates: 'August 1-3, 2003',
    venue: {
      name: 'Crowne Plaza Pittsburgh',
      address: 'Pittsburgh, PA'
    },
    activities: [
      'Three Rivers exploration',
      'Pittsburgh cultural attractions',
      'Steelers country experiences',
      'Traditional OMP festivities'
    ],
    stories: 'The Steel City forged new bonds among community members. Pittsburgh\'s unique character and friendly atmosphere made for an unforgettable gathering.'
  },

  '2002': {
    year: '2002',
    location: 'Baltimore, MD',
    dates: 'August 2-4, 2002',
    venue: {
      name: "Marriott's Hunt Valley Inn",
      address: 'Hunt Valley, MD (Baltimore area)'
    },
    activities: [
      'Inner Harbor visits',
      'National Aquarium tours',
      'Maryland seafood feasts',
      'Community celebrations'
    ],
    stories: 'Charm City lived up to its name, charming visitors with its waterfront attractions and famous blue crabs. The Baltimore area provided a wonderful East Coast gathering spot.'
  },

  '2001': {
    year: '2001',
    location: 'Las Vegas, NV',
    dates: 'August 3-5, 2001',
    venue: {
      name: 'Imperial Palace Hotel & Casino',
      address: '3535 Las Vegas Blvd S, Las Vegas, NV 89109'
    },
    activities: [
      'Las Vegas Strip exploration',
      'Casino gaming (for those of age)',
      'World-class dining',
      'Shows and entertainment',
      'Pool parties'
    ],
    stories: 'Sin City provided an unforgettable setting for one of the most memorable OMPs. What happens at the OMP stays at the OMP... mostly. The bright lights and endless entertainment of Vegas made this gathering legendary.'
  },

  '2000': {
    year: '2000',
    location: 'Cincinnati, OH',
    dates: 'August 4-6, 2000',
    venue: {
      name: 'Hotel near Paramount\'s Kings Island',
      address: 'Cincinnati/Mason, OH area'
    },
    activities: [
      "Paramount's Kings Island theme park",
      'Roller coaster adventures',
      'Cincinnati chili sampling',
      'Millennium celebrations',
      'Community bonding'
    ],
    stories: "As the new millennium began, the community gathered near Cincinnati's famous theme park. Roller coasters and shared adventures created memories that would last for years to come."
  },

  '1999': {
    year: '1999',
    location: 'Chicago, IL',
    dates: 'August 6-8, 1999',
    venue: {
      name: 'The Palmer House Hilton',
      address: '17 E Monroe St, Chicago, IL 60603'
    },
    activities: [
      'Historic Palmer House exploration',
      'Downtown Chicago sightseeing',
      'Lake Michigan visits',
      'Second annual gathering traditions'
    ],
    stories: 'The second official gathering took place at the legendary Palmer House Hilton, one of America\'s most historic hotels. Chicago\'s grandeur matched the growing ambitions of the community.'
  },

  '1998': {
    year: '1998',
    location: 'Washington, DC',
    dates: 'August 7-9, 1998',
    venue: {
      name: 'Washington, DC Area Hotel',
      address: 'Washington, DC Metro Area'
    },
    activities: [
      'National Mall exploration',
      'Smithsonian museum visits',
      'Monument tours',
      'The very first OMP activities',
      'Historic community gathering'
    ],
    stories: "Where it all began. The nation's capital hosted the very first Official MUD Party, bringing together players who had only known each other through text on a screen. For the first time, adventurers could put faces to the names they had quested alongside for years. This historic gathering established the tradition that would continue for decades to come."
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
        </div>
      </div>
    `;
  }

  // Activities section
  if (data.activities && data.activities.length > 0) {
    bodyHTML += `
      <div class="modal-section">
        <h3><i class="fa-solid fa-calendar-check"></i> Activities</h3>
        <ul>
          ${data.activities.map(activity => `<li>${activity}</li>`).join('')}
        </ul>
      </div>
    `;
  }

  // Stories section
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
 * Initialize event listeners
 */
function initOMP() {
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
