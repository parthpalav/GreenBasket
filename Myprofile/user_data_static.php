<?php
/**
 * User Data Script (Static Demo Version)
 * 
 * Contains functions for providing static user information
 * for demonstration purposes without requiring a database
 */

/**
 * Get user data from static array
 * 
 * @param mixed $conn Not used in static version
 * @param int $userId User ID to retrieve (1, 2, or 3)
 * @return array|null User data array or null if not found
 */
function getUserData($conn, $userId) {
    // Static demo data
    $users = [
        1 => [
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'dob' => 'April 12, 1985',
            'phone' => '+1-555-123-4567',
            'address' => '123 Green Street, Cityville, ST 12345',
            'role' => '#Farmer'
        ],
        2 => [
            'name' => 'Sarah Johnson',
            'email' => 'sarah.j@example.com',
            'dob' => 'August 23, 1990',
            'phone' => '+1-555-987-6543',
            'address' => '456 Harvest Road, Farmtown, ST 67890',
            'role' => 'Donor'
        ],
        3 => [
            'name' => 'Michael Chen',
            'email' => 'mchen@example.com',
            'dob' => 'November 5, 1978',
            'phone' => '+1-555-456-7890',
            'address' => '789 Organic Lane, Growville, ST 54321',
            'role' => 'Customer'
        ]
    ];
    
    // Return user data if user ID exists
    return $users[$userId] ?? null;
}

/**
 * Get user history data from static array
 * 
 * @param mixed $conn Not used in static version
 * @param int $userId User ID to retrieve history for (1, 2, or 3)
 * @return array Array of user history items
 */
function getUserHistory($conn, $userId) {
    // Static history data
    $history = [
        1 => [
            [
                'year' => '2023',
                'title' => 'Sustainable Farming Initiative',
                'description' => 'Led a community project to implement sustainable farming practices across three counties, resulting in 30% reduction in water usage.'
            ],
            [
                'year' => '2022',
                'title' => 'Organic Certification',
                'description' => 'Achieved full organic certification for entire farm operation after three years of transition.'
            ],
            [
                'year' => '2021',
                'title' => 'Farm Expansion',
                'description' => 'Expanded farming operation by acquiring an additional 50 acres of land for vegetable production.'
            ]
        ],
        2 => [
            [
                'year' => '2023',
                'title' => 'Major Donation Initiative',
                'description' => 'Contributed to food security program providing fresh produce to underprivileged communities, benefiting over 500 families.'
            ],
            [
                'year' => '2022',
                'title' => 'Fundraising Campaign',
                'description' => 'Organized fundraising event that collected $75,000 for sustainable agriculture education programs.'
            ],
            [
                'year' => '2021',
                'title' => 'Community Garden Sponsor',
                'description' => 'Sponsored the development of three community gardens in urban food desert areas.'
            ]
        ],
        3 => [
            [
                'year' => '2023',
                'title' => 'Premium Membership',
                'description' => 'Upgraded to premium subscription for priority access to seasonal produce and exclusive farm-to-table events.'
            ],
            [
                'year' => '2022',
                'title' => 'Cooking Workshop Participant',
                'description' => 'Participated in six farm-to-table cooking workshops using seasonal organic produce.'
            ],
            [
                'year' => '2021',
                'title' => 'First Purchase',
                'description' => 'Made first purchase of seasonal vegetable subscription box, beginning a journey toward healthier eating.'
            ]
        ]
    ];
    
    // Return history data if user ID exists, otherwise empty array
    return $history[$userId] ?? [];
}

/**
 * Update user data (STATIC DEMO)
 * This function simulates updating user data without actually persisting changes
 * 
 * @param mixed $conn Not used in static version
 * @param int $userId User ID
 * @param array $userData User data to update
 * @return bool Always returns true in this demo
 */
function updateUserData($conn, $userId, $userData) {
    // In static demo, we don't actually update anything
    // Just return success
    return true;
}