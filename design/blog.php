
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 60px 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 119, 190, 0.2);
        }

        .hero-section h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero-section p {
            font-size: 16px;
            opacity: 0.95;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .search-box {
            display: flex;
            gap: 10px;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            background-color: white;
            color: #1F2937;
        }

        .search-input::placeholder {
            color: #D1D5DB;
        }

        .search-btn {
            padding: 12px 24px;
            background-color: #10B981;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .search-btn:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .filter-label {
            font-size: 12px;
            font-weight: 700;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #E5E7EB;
            border-radius: 6px;
            font-size: 12px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:hover {
            border-color: #0077BE;
            background-color: #F0F9FF;
        }

        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        /* Blog Card */
        .blog-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        .blog-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #E0E7FF 0%, #F3E8FF 100%);
            overflow: hidden;
            position: relative;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .blog-category {
            position: absolute;
            top: 12px;
            left: 12px;
            background-color: #0077BE;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .blog-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        .blog-date {
            font-size: 11px;
            color: #9CA3AF;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
            line-height: 1.5;
        }

        .blog-excerpt {
            font-size: 13px;
            color: #6B7280;
            line-height: 1.6;
            flex: 1;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid #E5E7EB;
        }

        .blog-author {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .author-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        .author-name {
            font-size: 11px;
            color: #6B7280;
            font-weight: 600;
        }

        .read-time {
            font-size: 11px;
            color: #9CA3AF;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* No Image Placeholder */
        .blog-image-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            font-size: 40px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
        }

        .pagination-btn {
            padding: 8px 12px;
            border: 1px solid #E5E7EB;
            background-color: white;
            color: #6B7280;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination-btn:hover {
            border-color: #0077BE;
            color: #0077BE;
            background-color: #F0F9FF;
        }

        .pagination-btn.active {
            background-color: #0077BE;
            color: white;
            border-color: #0077BE;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 20px;
            }

            .hero-section h1 {
                font-size: 28px;
            }

            .search-box {
                flex-direction: column;
            }

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-select {
                width: 100%;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>


    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section">
            <h1>Travel Blog</h1>
            <p>Discover amazing travel stories, tips, and destinations from our community</p>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search articles...">
                <button class="search-btn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <span class="filter-label">Filter By:</span>
            <select class="filter-select">
                <option>All Categories</option>
                <option>Destination Guide</option>
                <option>Travel Tips</option>
                <option>Budget Travel</option>
                <option>Adventure</option>
                <option>Luxury Travel</option>
            </select>
            <select class="filter-select">
                <option>Latest</option>
                <option>Most Popular</option>
                <option>Most Viewed</option>
            </select>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            <!-- Blog Card 1 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Destination</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 25 Oct 2024
                    </div>
                    <div class="blog-title">Top 10 Must-Visit Destinations in Dubai</div>
                    <div class="blog-excerpt">Explore the best attractions, hidden gems, and unforgettable experiences in Dubai. From pristine beaches to towering skyscrapers...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">AK</div>
                        <div class="author-name">Ahmed Khan</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 5 min read
                    </div>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Travel Tips</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 23 Oct 2024
                    </div>
                    <div class="blog-title">Complete Guide: Budget Travel in Southeast Asia</div>
                    <div class="blog-excerpt">Learn how to travel through Thailand, Vietnam, and Cambodia on a budget. Discover affordable accommodations, local food spots...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">FS</div>
                        <div class="author-name">Fatima Singh</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 8 min read
                    </div>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Adventure</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 20 Oct 2024
                    </div>
                    <div class="blog-title">Hiking the Swiss Alps: A Complete Experience</div>
                    <div class="blog-excerpt">Experience the breathtaking beauty of the Swiss Alps. This guide covers the best hiking trails, seasonal tips, and what to pack...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">MR</div>
                        <div class="author-name">Marco Rodriguez</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 6 min read
                    </div>
                </div>
            </div>

            <!-- Blog Card 4 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Luxury Travel</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 18 Oct 2024
                    </div>
                    <div class="blog-title">5-Star Hotels in Europe: Where to Stay</div>
                    <div class="blog-excerpt">Discover the most luxurious and romantic hotels across Europe. From Paris to Rome, we've curated the best luxury destinations...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">SJ</div>
                        <div class="author-name">Sophia James</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 7 min read
                    </div>
                </div>
            </div>

            <!-- Blog Card 5 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Destination</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 15 Oct 2024
                    </div>
                    <div class="blog-title">Island Hopping in the Maldives: Paradise Awaits</div>
                    <div class="blog-excerpt">Explore the stunning islands of the Maldives with our complete guide. Learn about resorts, water activities, and best diving spots...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">LM</div>
                        <div class="author-name">Liam Murphy</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 9 min read
                    </div>
                </div>
            </div>

            <!-- Blog Card 6 -->
            <div class="blog-card">
                <div class="blog-image">
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="blog-category">Travel Tips</div>
                </div>
                <div class="blog-content">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i> 12 Oct 2024
                    </div>
                    <div class="blog-title">Visa Requirements & Travel Documents Checklist</div>
                    <div class="blog-excerpt">Never forget important documents again! Our comprehensive checklist covers everything you need for international travel...</div>
                </div>
                <div class="blog-footer">
                    <div class="blog-author">
                        <div class="author-avatar">JP</div>
                        <div class="author-name">Jessica Park</div>
                    </div>
                    <div class="read-time">
                        <i class="fas fa-clock"></i> 4 min read
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="pagination-btn" disabled>
                <i class="fas fa-chevron-left"></i> Prev
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">...</button>
            <button class="pagination-btn">8</button>
            <button class="pagination-btn">
                Next <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <?php include 'footer.php'; ?>