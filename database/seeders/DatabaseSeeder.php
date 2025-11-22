<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users first
        User::factory(13)->create();

        $admin = User::factory()->create([
            'email'    => 'test@example.com',
            'name'     => 'Admin',
            'role'     => 'administrator',
            'password' => bcrypt('password'),
        ]);

        // Create diverse blog posts with different image dimensions
        $samplePosts = [
            [
                'title' => 'The Future of Web Development in 2025',
                'content' => 'Web development continues to evolve at a rapid pace. From AI-powered tools to progressive web apps, developers have more options than ever. This comprehensive guide explores the latest trends, frameworks, and best practices that are shaping the future of web development. We\'ll dive deep into emerging technologies, discuss performance optimization techniques, and examine how modern development practices are changing the industry landscape.',
                'preview_image' => 'https://picsum.photos/800/600?random=1',
                'main_image' => 'https://picsum.photos/1200/800?random=1',
            ],
            [
                'title' => 'Mastering Laravel: Advanced Techniques',
                'content' => 'Laravel has become one of the most popular PHP frameworks for good reason. In this article, we explore advanced Laravel techniques including service containers, facades, middleware, and eloquent relationships. Learn how to build scalable, maintainable applications with Laravel\'s elegant syntax and powerful features. We\'ll cover testing strategies, optimization tips, and architectural patterns that will take your Laravel skills to the next level.',
                'preview_image' => 'https://picsum.photos/600/800?random=2',
                'main_image' => 'https://picsum.photos/1000/1400?random=2',
            ],
            [
                'title' => 'Design Trends That Will Define 2025',
                'content' => 'Design trends are constantly evolving, influenced by technology, culture, and user expectations. This year brings exciting new directions in minimalism, bold typography, immersive experiences, and sustainable design practices. Discover how leading designers are pushing boundaries while maintaining usability and accessibility. From color palettes to layout strategies, we cover everything you need to stay ahead of the curve.',
                'preview_image' => 'https://picsum.photos/1920/1080?random=3',
                'main_image' => 'https://picsum.photos/2400/1350?random=3',
            ],
            [
                'title' => 'Building Responsive Websites: A Complete Guide',
                'content' => 'Responsive design is no longer optional—it\'s essential. With users accessing websites from countless devices, creating fluid, adaptable layouts is crucial. This guide covers mobile-first design principles, CSS Grid and Flexbox techniques, breakpoint strategies, and performance optimization for different screen sizes. Learn how to create beautiful, functional websites that work perfectly on any device.',
                'preview_image' => 'https://picsum.photos/500/500?random=4',
                'main_image' => 'https://picsum.photos/1000/1000?random=4',
            ],
            [
                'title' => 'JavaScript ES2025: New Features You Need to Know',
                'content' => 'JavaScript continues to evolve with exciting new features and improvements. ES2025 brings powerful additions that make code more concise, readable, and performant. Explore new array methods, enhanced async capabilities, pattern matching, and more. Stay up-to-date with the latest JavaScript features and learn how to integrate them into your projects effectively.',
                'preview_image' => 'https://picsum.photos/1200/400?random=5',
                'main_image' => 'https://picsum.photos/1800/600?random=5',
            ],
            [
                'title' => 'Database Optimization Tips for High-Performance Apps',
                'content' => 'Database performance can make or break your application. Learn essential optimization techniques including indexing strategies, query optimization, caching mechanisms, and database scaling. We cover both SQL and NoSQL approaches, providing practical examples and real-world scenarios. Master the art of building lightning-fast database-driven applications.',
                'preview_image' => 'https://picsum.photos/400/600?random=6',
                'main_image' => 'https://picsum.photos/800/1200?random=6',
            ],
            [
                'title' => 'Cybersecurity Best Practices for Modern Web Apps',
                'content' => 'Security is paramount in today\'s digital landscape. This comprehensive guide covers authentication, authorization, encryption, CSRF protection, SQL injection prevention, and secure API design. Learn how to identify vulnerabilities, implement security headers, and follow industry best practices to protect your applications and users from common threats.',
                'preview_image' => 'https://picsum.photos/1000/750?random=7',
                'main_image' => 'https://picsum.photos/1600/1200?random=7',
            ],
            [
                'title' => 'The Art of Clean Code: Principles and Practices',
                'content' => 'Writing clean, maintainable code is a skill that separates good developers from great ones. Explore SOLID principles, design patterns, code refactoring techniques, and documentation best practices. Learn how to write code that is not only functional but also elegant, testable, and easy for other developers to understand and maintain.',
                'preview_image' => 'https://picsum.photos/900/900?random=8',
                'main_image' => 'https://picsum.photos/1400/1400?random=8',
            ],
            [
                'title' => 'API Design: RESTful Best Practices',
                'content' => 'Designing robust, scalable APIs requires careful planning and adherence to best practices. This guide covers RESTful architecture, versioning strategies, authentication methods, rate limiting, error handling, and documentation. Learn how to create APIs that are intuitive, secure, and developer-friendly.',
                'preview_image' => 'https://picsum.photos/1600/900?random=9',
                'main_image' => 'https://picsum.photos/2000/1125?random=9',
            ],
            [
                'title' => 'Mobile-First Development: Why It Matters',
                'content' => 'Mobile devices now account for the majority of web traffic, making mobile-first development essential. Discover why starting with mobile designs leads to better user experiences, faster performance, and more maintainable code. We cover progressive enhancement, touch interactions, and mobile-specific optimizations that will improve your projects.',
                'preview_image' => 'https://picsum.photos/720/1280?random=10',
                'main_image' => 'https://picsum.photos/1080/1920?random=10',
            ],
            [
                'title' => 'Testing Strategies for Bulletproof Applications',
                'content' => 'Comprehensive testing is the foundation of reliable software. Learn about unit testing, integration testing, end-to-end testing, and test-driven development. We cover popular testing frameworks, mocking strategies, continuous integration, and how to build a robust testing pipeline that catches bugs before they reach production.',
                'preview_image' => 'https://picsum.photos/1400/700?random=11',
                'main_image' => 'https://picsum.photos/2100/1050?random=11',
            ],
            [
                'title' => 'Cloud Computing: Choosing the Right Platform',
                'content' => 'Cloud platforms offer incredible scalability and flexibility, but choosing the right one can be challenging. Compare AWS, Azure, Google Cloud, and other providers. Learn about serverless architecture, containerization, microservices, and cloud-native development practices that will help you make informed infrastructure decisions.',
                'preview_image' => 'https://picsum.photos/640/480?random=12',
                'main_image' => 'https://picsum.photos/1280/960?random=12',
            ],
        ];

        foreach ($samplePosts as $postData) {
            Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'preview_image' => $postData['preview_image'],
                'main_image' => $postData['main_image'],
                'content' => $postData['content'],
            ]);
        }

        // Create additional random posts
        Post::factory(8)->create();
    }
}
