<?php

namespace Database\Seeders;

use App\Models\Poster;
use Illuminate\Database\Seeder;

class PosterSeeder extends Seeder
{
    public function run(): void
    {
        Poster::create([
            'title' => 'Annual Tech Conference 2025',
            'description' => 'Join us for the biggest tech conference of the year.',
            'image_url' => 'https://via.placeholder.com/600x800/667eea/ffffff?text=Tech+Conference',
        ]);

        Poster::create([
            'title' => 'Community Health Awareness',
            'description' => 'Get informed about important health topics.',
            'image_url' => 'https://via.placeholder.com/600x800/764ba2/ffffff?text=Health+Campaign',
        ]);

        Poster::create([
            'title' => 'Environmental Sustainability',
            'description' => 'Learn practical ways to reduce your carbon footprint.',
            'image_url' => 'https://via.placeholder.com/600x800/48bb78/ffffff?text=Sustainability',
        ]);

        Poster::create([
            'title' => 'Youth Leadership Program',
            'description' => 'Empowering the next generation of leaders.',
            'image_url' => 'https://via.placeholder.com/600x800/ed8936/ffffff?text=Leadership',
        ]);

        Poster::create([
            'title' => 'Digital Innovation Summit',
            'description' => 'Explore cutting-edge digital technologies.',
            'image_url' => 'https://via.placeholder.com/600x800/4299e1/ffffff?text=Innovation',
        ]);

        Poster::create([
            'title' => 'Cultural Heritage Festival',
            'description' => 'Celebrate our rich cultural heritage.',
            'image_url' => 'https://via.placeholder.com/600x800/9f7aea/ffffff?text=Heritage',
        ]);

        Poster::create([
            'title' => 'Career Development Fair',
            'description' => 'Connect with top employers.',
            'image_url' => 'https://via.placeholder.com/600x800/38b2ac/ffffff?text=Career+Fair',
        ]);

        Poster::create([
            'title' => 'Education Excellence Awards',
            'description' => 'Recognizing outstanding achievements.',
            'image_url' => 'https://via.placeholder.com/600x800/f56565/ffffff?text=Education',
        ]);
    }
}

