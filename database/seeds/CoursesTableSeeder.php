<?php

use App\Course;
use App\Discipline;
use App\Institution;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $courses = [
            [
                'name' => 'CMSC 127',
                'description' => 'Database Systems: This course provides an introduction to the fundamental concepts of database systems, 
                covering topics such as data modeling, SQL, normalization, and database security. Students will gain hands-on experience 
                in designing and managing databases, equipping them with essential skills for careers in software development and data analysis.',
                'institution_id' => 1,
                'price' => null,
                'image' => 'img/Courses/database.jpg'
            ],
            [
                'name' => 'COMM 10',
                'description' => 'Critical Perspective in Communication: Develop a critical lens to examine the complexities of communication in society. 
                Explore the intersections of culture, power, and media, analyzing how communication shapes our understanding of identities, relationships, 
                and social structures. Engage in thought-provoking discussions and explore various theories and frameworks to critically analyze communication 
                practices and their implications.',
                'institution_id' => 2,
                'price' => null,
                'image' => 'img/Courses/comm10.jpg'
            ],
            [
                'name' => 'PE 2FC',
                'description' => 'PE Fencing: Discover the art and sport of fencing in this engaging physical education course. Learn the fundamental techniques, 
                strategies, and rules of this centuries-old combat sport. Develop agility, coordination, and mental focus as you engage in thrilling bouts with fellow students. 
                Explore the rich history and cultural significance of fencing while honing your skills and fostering a competitive spirit.',
                'institution_id' => 3,
                'price' => null,
                'image' => 'img/Courses/fencing.jpg'
            ],
            [
                'name' => 'CMSC 121',
                'description' => 'Computer Organization and Architecture: This course delves into the fundamental principles of computer organization and architecture. 
                Students will study the inner workings of a computer system, including the organization of memory, central processing unit (CPU) design, 
                instruction set architecture, and input/output systems. Through hands-on exercises and projects, students will gain a deep understanding 
                of how computer components interact and how they contribute to overall system performance and functionality.',
                'institution_id' => 4,
                'price' => null,
                'image' => 'img/Courses/cs121.jpg'
            ],
            [
                'name' => 'AREA 101',
                'description' => 'The Introduction to Area Studies course provides a comprehensive overview of the interdisciplinary field of Area Studies. 
                Through an exploration of various regions and their unique characteristics, students will develop a deeper understanding of the cultural, 
                social, economic, and political dynamics that shape our globalized world. The course introduces key theories, research methods, 
                and analytical tools used in the study of different geographic regions, allowing students to gain a comparative perspective on 
                diverse societies and cultures. By examining the interplay between local and global forces, students will develop critical thinking skills 
                and enhance their cross-cultural understanding. This course serves as a solid foundation for further studies in fields such as 
                international relations, anthropology, geography, and global studies.',
                'institution_id' => 5,
                'price' => null,
                'image' => 'img/Courses/areastud.jpg'
            ],
            [
                'name' => 'ANTHRO 101',
                'description' => 'Physical Anthropology is an engaging and interdisciplinary course that delves into the scientific study of human evolution, 
                biological diversity, and the interactions between biology and culture. Through a combination of lectures, laboratory work, and hands-on activities, 
                students will explore the biological aspects of humanity, including genetics, skeletal anatomy, primatology, and forensic anthropology. 
                This course will provide a comprehensive understanding of human origins, adaptation, and variation, examining topics such as 
                human evolution, primate behavior, human genetics, and forensic identification. Students will learn to analyze and interpret 
                biological data, engage in critical thinking, and apply scientific principles to the study of human biology.',
                'institution_id' => 6,
                'price' => null,
                'image' => 'img/Courses/anthro.jpg'
            ],
            [
                'name' => 'BIO 116',
                'description' => 'Invertebrate Zoology is an exciting course that explores the incredible diversity and biology of invertebrate animals. 
                Through a combination of lectures, laboratory investigations, and field trips, students will delve into the world of organisms without 
                backbones, including insects, mollusks, worms, arachnids, and more. This course will provide a comprehensive understanding of the anatomy, 
                physiology, behavior, and ecology of invertebrates, as well as their evolutionary history and ecological roles. Students will have 
                the opportunity to observe and study live specimens, develop taxonomic skills, and conduct hands-on experiments to better understand 
                the fascinating adaptations and life cycles of these organisms. Invertebrate Zoology is ideal for students interested in biology, ecology, 
                environmental science, or anyone curious about the captivating world of invertebrate animals.',
                'institution_id' => 7,
                'price' => null,
                'image' => 'img/Courses/invertebrate.jpg'
            ],
            [
                'name' => 'PHYSICS 121',
                'description' => 'Theoretical Mechanics I is a foundational course that explores the principles and concepts underlying 
                classical mechanics. Students will develop a strong understanding of Newtons laws of motion, kinematics, dynamics, and energy 
                conservation through theoretical lectures and problem-solving exercises. This course provides the necessary groundwork for 
                further studies in mechanics and prepares students for advanced topics in physics and engineering.',
                'institution_id' => 8,
                'price' => null,
                'image' => 'img/Courses/mechanics.jpg'
            ],
            [
                'name' => 'PHYSICS 71',
                'description' => 'Elementary Physics 1 is an introductory course that provides a comprehensive overview of the fundamental 
                principles and concepts in physics. Through engaging lectures and hands-on laboratory experiments, students will explore 
                topics such as mechanics, thermodynamics, and waves. This course aims to develop a solid foundation in physics and critical 
                thinking skills necessary for further studies in science and engineering.',
                'institution_id' => 9,
                'price' => null,
                'image' => 'img/Courses/physics1.jpg'
            ],
            [
                'name' => 'CD 100',
                'description' => 'The Philippine Community course delves into the rich cultural, social, and historical aspects of the 
                Philippines. Students will explore topics such as Philippine history, traditions, languages, and contemporary issues. 
                Through lectures, discussions, and interactive activities, students will gain a deeper understanding of the diverse communities 
                that make up the Philippines and their contributions to the nations identity. This course fosters cultural appreciation, 
                intercultural communication skills, and a sense of pride in Philippine heritage.',
                'institution_id' => 10,
                'price' => null,
                'image' => 'img/Courses/philcom.jpg'
            ],
            [
                'name' => 'CS 112',
                'description' => 'Rural Development is a comprehensive course that focuses on strategies and practices for sustainable development 
                in rural areas. Through case studies, field visits, and interactive discussions, students will explore topics such as agricultural 
                systems, community empowerment, infrastructure development, and environmental conservation. This course equips students with the 
                knowledge and skills necessary to address the unique challenges and opportunities of rural communities, aiming to create positive 
                social, economic, and environmental impacts.',
                'institution_id' => 11,
                'price' => null,
                'image' => 'img/Courses/rural.jpg'
            ],
            [
                'name' => 'PHILARTS 113',
                'description' => 'The Asian Tradition in Philippine Arts course explores the rich artistic heritage of the Philippines, 
                rooted in the broader Asian cultural context. Through lectures, visual presentations, and hands-on activities, 
                students will delve into various art forms such as traditional dance, music, theater, and visual arts. This course aims to 
                deepen students understanding of the cultural connections between the Philippines and its neighboring Asian countries, 
                fostering appreciation for the diversity and beauty of Asian arts and their influence on Philippine artistic expressions.',
                'institution_id' => 12,
                'price' => null,
                'image' => 'img/Courses/asianart.jpg'
            ],
            [
                'name' => 'OR COM 111',
                'description' => 'The Technical Reporting course provides students with essential skills for effectively communicating 
                technical information in written form. Through practical exercises and assignments, students will learn to write clear, 
                concise, and professional reports tailored to various technical fields. This course emphasizes the importance of organization, 
                data presentation, and effective communication techniques, equipping students with the tools necessary to convey 
                complex technical concepts with clarity and precision.',
                'institution_id' => 13,
                'price' => null,
                'image' => 'img/Courses/reporting.jpg'
            ],
        ];

        foreach ($courses as $id => $courseData) {
            $id++;
            $course = Course::create($courseData);
            $course->addMedia(public_path($courseData['image']))->preservingOriginal()->toMediaCollection('photo');
            $course->disciplines()->sync([$id]);
        }
    }
}
