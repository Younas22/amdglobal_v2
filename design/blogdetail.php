    <?php include 'header.php'; ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F7FA;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Back Button */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #0077BE;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            gap: 10px;
            color: #005A9C;
        }

        /* Article Container */
        .article-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        /* Featured Image */
        .featured-image {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #E0E7FF 0%, #F3E8FF 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            font-size: 80px;
            position: relative;
            overflow: hidden;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-credit {
            position: absolute;
            bottom: 12px;
            right: 12px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
        }

        /* Article Header */
        .article-header {
            padding: 40px 40px 20px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12px;
            color: #6B7280;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .article-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .article-category {
            display: inline-block;
            background-color: #F0F4FF;
            color: #0077BE;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .article-title {
            font-size: 36px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 16px;
            line-height: 1.4;
        }

        .article-excerpt {
            font-size: 16px;
            color: #6B7280;
            line-height: 1.8;
            padding-bottom: 20px;
            border-bottom: 1px solid #E5E7EB;
        }

        /* Author Info */
        .author-section {
            display: flex;
            gap: 16px;
            align-items: center;
            padding: 20px 0;
        }

        .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .author-name {
            font-size: 13px;
            font-weight: 700;
            color: #1F2937;
        }

        .author-details {
            font-size: 11px;
            color: #6B7280;
        }

        /* Article Body */
        .article-body {
            padding: 40px;
            padding-top: 0;
        }

        .article-section {
            margin-bottom: 32px;
        }

        .article-section h2 {
            font-size: 24px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 16px;
            margin-top: 24px;
        }

        .article-section h3 {
            font-size: 18px;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 12px;
            margin-top: 16px;
        }

        .article-section p {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .article-section ul,
        .article-section ol {
            margin-left: 20px;
            margin-bottom: 12px;
        }

        .article-section li {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.8;
            margin-bottom: 8px;
        }

        .article-section strong {
            color: #003580;
            font-weight: 700;
        }

        .article-highlight {
            background-color: #F0F9FF;
            border-left: 4px solid #0077BE;
            padding: 16px;
            margin: 20px 0;
            border-radius: 6px;
        }

        .article-highlight p {
            margin-bottom: 0;
            color: #0077BE;
            font-weight: 500;
        }

        /* Share Section */
        .share-section {
            background-color: #F9FAFB;
            border-top: 1px solid #E5E7EB;
            border-bottom: 1px solid #E5E7EB;
            padding: 20px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .share-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .share-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .share-btn {
            padding: 8px 14px;
            border: 1px solid #E5E7EB;
            background-color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            color: #6B7280;
        }

        .share-btn:hover {
            border-color: #0077BE;
            color: #0077BE;
            background-color: #F0F9FF;
        }

        /* Tags */
        .tags-section {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .tag {
            background-color: #F0F4FF;
            color: #0077BE;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tag:hover {
            background-color: #0077BE;
            color: white;
        }

        /* Related Articles */
        .related-section {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid #E5E7EB;
        }

        .related-title {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 24px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .related-card {
            background: #F9FAFB;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .related-card:hover {
            transform: translateY(-4px);
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .related-card-image {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, #E0E7FF 0%, #F3E8FF 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #D1D5DB;
        }

        .related-card-content {
            padding: 16px;
        }

        .related-card-title {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .related-card-meta {
            font-size: 10px;
            color: #9CA3AF;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .featured-image {
                height: 250px;
            }

            .article-header {
                padding: 24px;
            }

            .article-body {
                padding: 24px;
            }

            .article-title {
                font-size: 24px;
            }

            .share-buttons {
                flex-direction: column;
            }

            .share-btn {
                justify-content: center;
            }
        }
    </style>


    <div class="container">
        <!-- Back Link -->
        <a href="#" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>

        <!-- Article Container -->
        <div class="article-container">
            <!-- Featured Image -->
            <div class="featured-image">
                <i class="fas fa-image"></i>
                <div class="image-credit">Photo Credit: Travel Studio</div>
            </div>

            <!-- Article Header -->
            <div class="article-header">
                <div class="article-meta">
                    <span class="article-category">Destination Guide</span>
                    <div class="article-meta-item">
                        <i class="fas fa-calendar"></i>
                        25 October 2024
                    </div>
                    <div class="article-meta-item">
                        <i class="fas fa-clock"></i>
                        8 min read
                    </div>
                </div>

                <h1 class="article-title">Top 10 Must-Visit Destinations in Dubai</h1>

                <p class="article-excerpt">
                    Dubai is one of the most exciting and dynamic cities in the world. From stunning beaches to iconic landmarks, discover the best attractions and hidden gems that make Dubai an unforgettable destination.
                </p>

                <!-- Author Info -->
                <div class="author-section">
                    <div class="author-avatar">AK</div>
                    <div class="author-info">
                        <div class="author-name">Ahmed Khan</div>
                        <div class="author-details">Travel Enthusiast | Dubai Expert</div>
                    </div>
                </div>
            </div>

            <!-- Article Body -->
            <div class="article-body">
                <!-- Introduction Section -->
                <div class="article-section">
                    <p>
                        Dubai has transformed from a small trading port into a global metropolis that attracts millions of visitors every year. Whether you're planning your first trip or returning for another adventure, this guide will help you discover the best that Dubai has to offer. From world-class shopping to thrilling desert safaris, Dubai offers something for everyone.
                    </p>
                </div>

                <!-- Section 1 -->
                <div class="article-section">
                    <h2>1. Burj Khalifa - Touch the Clouds</h2>
                    <p>
                        Standing at 828 meters, the Burj Khalifa is the tallest building in the world and offers breathtaking views from its observation decks. The "At the Top" deck is at 450m, while the "At the Top Sky" deck reaches 555m, providing panoramic vistas of the city and coastline.
                    </p>
                    <p>
                        <strong>Pro Tip:</strong> Visit at sunset for the best photographs. The golden hour lighting combined with the city lights creates magical moments.
                    </p>
                </div>

                <!-- Section 2 -->
                <div class="article-section">
                    <h2>2. Palm Jumeirah & Atlantis The Palm</h2>
                    <p>
                        This artificial island shaped like a palm tree is an engineering marvel and home to luxury resorts. Atlantis The Palm offers water parks, aquariums, and world-class dining experiences.
                    </p>
                    <ul>
                        <li>Aquaventure Waterpark with thrilling slides</li>
                        <li>The Aquarium with thousands of marine creatures</li>
                        <li>Luxury shopping and dining options</li>
                        <li>Beach access with pristine waters</li>
                    </ul>
                </div>

                <!-- Highlight Section -->
                <div class="article-highlight">
                    <p><i class="fas fa-lightbulb"></i> <strong>Insider Tip:</strong> Many hotels offer day passes to water parks at discounted rates. Check with your accommodation for deals!</p>
                </div>

                <!-- Section 3 -->
                <div class="article-section">
                    <h2>3. Dubai Marina & JBR Beach</h2>
                    <p>
                        Dubai Marina is a stunning waterfront destination with luxury yachts, waterfront restaurants, and shopping centers. JBR Beach, just nearby, is one of the most popular public beaches with pristine sand and clear waters.
                    </p>
                    <h3>Activities:</h3>
                    <ul>
                        <li>Yacht cruises at sunset</li>
                        <li>Water sports (jet skiing, paddleboarding)</li>
                        <li>Beach volleyball and swimming</li>
                        <li>World-class dining at Marina restaurants</li>
                    </ul>
                </div>

                <!-- Section 4 -->
                <div class="article-section">
                    <h2>4. Desert Safari Adventure</h2>
                    <p>
                        Experience the natural beauty of the Arabian Desert with a thrilling safari. Most tours include dune bashing, camel rides, and visits to traditional Bedouin camps where you can enjoy authentic cuisine under the stars.
                    </p>
                    <p>
                        Desert safaris typically run from afternoon to evening, allowing you to witness the spectacular desert sunset followed by dinner at a Bedouin-style camp with traditional entertainment.
                    </p>
                </div>

                <!-- Section 5 -->
                <div class="article-section">
                    <h2>5. The Gold Souk & Traditional Markets</h2>
                    <p>
                        Immerse yourself in Dubai's heritage by exploring the traditional souks. The Gold Souk is a must-visit, featuring over 200 gold retailers offering intricate jewelry designs. The Spice Souk offers aromatic spices and traditional goods.
                    </p>
                </div>

                <!-- More Sections -->
                <div class="article-section">
                    <h2>6-10. More Amazing Attractions</h2>
                    <p>
                        Dubai has even more to offer including the Dubai Museum, Al Fahidi Historical District, Shopping at The Dubai Mall, Snow skiing at Ski Dubai, and enjoying the nightlife at Jumeirah Beach Open Air Theatre.
                    </p>
                </div>

                <!-- Conclusion -->
                <div class="article-section">
                    <h2>Conclusion</h2>
                    <p>
                        Dubai truly is a destination that caters to all types of travelers. Whether you seek adventure, luxury, cultural experiences, or simply relaxation on beautiful beaches, Dubai delivers unforgettable memories. Plan your trip today and discover why millions choose Dubai as their favorite destination!
                    </p>
                </div>

                <!-- Share Section -->
                <div class="share-section">
                    <div class="share-title">Share This Article</div>
                    <div class="share-buttons">
                        <button class="share-btn">
                            <i class="fab fa-facebook"></i> Facebook
                        </button>
                        <button class="share-btn">
                            <i class="fab fa-twitter"></i> Twitter
                        </button>
                        <button class="share-btn">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </button>
                        <button class="share-btn">
                            <i class="fas fa-envelope"></i> Email
                        </button>
                    </div>
                </div>

                <!-- Tags -->
                <div class="article-section">
                    <p style="margin-bottom: 8px;">
                        <strong>Tags:</strong>
                    </p>
                    <div class="tags-section">
                        <span class="tag">Dubai</span>
                        <span class="tag">Travel Guide</span>
                        <span class="tag">Middle East</span>
                        <span class="tag">Destinations</span>
                        <span class="tag">Adventure</span>
                        <span class="tag">Beach</span>
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="related-section">
                    <h2 class="related-title">Related Articles</h2>
                    <div class="related-grid">
                        <div class="related-card">
                            <div class="related-card-image">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="related-card-content">
                                <div class="related-card-title">Budget Travel in Middle East</div>
                                <div class="related-card-meta">
                                    <i class="fas fa-calendar"></i> 20 Oct 2024 • 5 min read
                                </div>
                            </div>
                        </div>

                        <div class="related-card">
                            <div class="related-card-image">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="related-card-content">
                                <div class="related-card-title">Best Hotels in Abu Dhabi</div>
                                <div class="related-card-meta">
                                    <i class="fas fa-calendar"></i> 18 Oct 2024 • 6 min read
                                </div>
                            </div>
                        </div>

                        <div class="related-card">
                            <div class="related-card-image">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="related-card-content">
                                <div class="related-card-title">Luxury Shopping Guide for Dubai</div>
                                <div class="related-card-meta">
                                    <i class="fas fa-calendar"></i> 15 Oct 2024 • 7 min read
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php include 'footer.php'; ?>