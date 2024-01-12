<?php

use App\Institution;
use App\User;
use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = [
            [
                'name' => 'Department of Physical Sciences and Mathematics',
                'description' => 'The Department of Physical Sciences and Mathematics is a center of excellence providing globally competitive and socially relevant education and research in science 
                and mathematics integrating the health sciences ethos. The programs it offers are the BS in Biochemistry, BS in Applied Physics and BS in Computer Science. Its mission is to 
                produce leaders and innovators in the field of science, health, and technology, to generate research outputs of national and global relevance and to provide education, training, 
                and technical services to the community.',
                'image' => 'img/CAS/dpsm.jpg',
            ],
            [
                'name' => 'Department of Arts and Communication',
                'description' => 'The Department of Arts and Communication (DAC) A diverse community of artists, professionals, and scholars  engaged in interdisciplinary teaching and research, 
                and public service in the arts, communication, and health. The programs it offers are the BA in Organizational Communication and BA in Philippine Arts. Its mission is to provide a more 
                holistic approach to health education by applying complementary frameworks that encompass human experience and creativity and to produce graduates with a humanistic, cultural, and 
                spiritual orientation in health, and communicative skills and competence in various linguistic modes and media in the context of arts in communities and organizations.',
                'image' => 'img/CAS/dac.jpg',
            ],
            [
                'name' => 'Department of Physical Education',
                'description' => 'The Department of Physical Education (DPE) values the quality of life of its stakeholders through the improvement of health and wellness. The department gives importance 
                to good character development among students and athletes through its various projects and programs. The department recognizes collaborating with various disciplines as essential in 
                achieving its aspirations. The department will be recognized for developing competent and innovative exercise science professionals, contributing to knowledge through research, and 
                continued service to its stakeholders in the fields of physical activity and wellness.',
                'image' => 'img/CAS/dpe.jpg',
            ],
            [
                'name' => 'Department of Behavioral Sciences',
                'description' => 'The Department of Behavioral Sciences (BBS), A center of excellence in Behavioral Sciences and health policy, guided by the ideals of integrity, service, professionalism, 
                nationalism and internationalism. Its mission is to be the provider and leader of excellent and responsive education, research and service in the Behavioral Sciences and health policy.',
                'image' => 'img/CAS/dbs.jpg',
            ],
            [
                'name' => 'Department of Biology',
                'description' => 'The Department of Biology (DB) is a center of excellence in biological research and education which produces competent, nationalistic and ethical biologists while upholding 
                the values of the University. Its mission is to produce outstanding and humane biologists who can teach, conduct research and pursue advanced studies in biology and related disciplines. 
                It shall provide its relevance to society through instruction, research, and public service that addresses the health, socioeconomic and environmental concerns of the nation. The program it offers is the BS in Biology.',
                'image' => 'img/CAS/db.jpg',
            ],
            [
                'name' => 'Department of Social Sciences',
                'description' => 'The Department of Social Sciences (DSS) envisions a leading exemplar of academic professionals committed to promoting a nationalist, democratic, scientific, and health-oriented education in the social sciences. 
                Its mission is to conduct inter-disciplinary collaboration and relevant studies in the social sciences which address various concerns and problems of the Philippine society and the globalized world. 
                The programs it offers are the BA in Social Sciences, BA in Political Sciences and BA in Development Studies.',
                'image' => 'img/CAS/dss.jpg',
            ],
        ];

        foreach ($institutions as $id => $institutionData) {
            $id++;
            $institution = Institution::create($institutionData);
            $institution->addMedia(public_path($institutionData['image']))->preservingOriginal()->toMediaCollection('logo');
        }

        User::find(2)->update(['institution_id' => 1]);
    }
}
