<?php

use Illuminate\Database\Seeder;
use App\Waikoa\Model\Lesson;

class LessonTableSeeder extends Seeder {

    public function run()
    {        
        DB::table('lessons')->truncate();

        $lesson = Lesson::create([			
			'title' => 'Introduction to a 90 Day Journey',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium tincidunt risus sed elementum. 
				Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis neque orci, pharetra 
				id scelerisque id, venenatis ut tellus. Mauris vestibulum massa quam, et commodo sem mattis eu. Morbi commodo, ante 
				vitae luctus tempor, metus enim rhoncus dolor, id elementum urna sapien in lorem. Curabitur vel efficitur nisi. 
				Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris id sagittis tellus, 
				id pellentesque justo. Suspendisse nec viverra ante, ac molestie lacus. Pellentesque blandit, massa eu maximus consequat, 
				turpis ex ultrices erat, non commodo nulla sapien vel lorem. Vestibulum at convallis ligula. Sed sit amet sem vulputate, 
				pulvinar magna nec, commodo lectus.',
			'type' => 1,
			'date' => date('y-m-d h:i:s',time()),
			'url' => 'http://www.google.com',
			'download_url' => 'http://www.advancedclientsystems.com/SPE01_01/application/ckeditor/ckfinder/userfiles/images/stevestage.jpg',
			'start_time' => date('y-m-d h:i:s',time()),
			'end_time' => date('y-m-d h:i:s',time()),
			'date_visible' => date('y-m-d h:i:s',time()),
			'email_on' => date('y-m-d h:i:s',time()),
			'comments_allowed' => 1,
			'before_message' => 'In ultricies finibus magna in lobortis. Sed laoreet risus mauris, nec laoreet nisl scelerisque non. 
				Integer quis turpis quis ex pretium maximus. Praesent vulputate, quam et vulputate porttitor, metus ipsum pulvinar ante, lacinia 
				tempor libero felis eu turpis. Phasellus elit purus, aliquam non dolor vitae, lobortis euismod arcu. Nunc mauris velit, ornare 
				vitae lacinia eget, blandit quis sem. In tincidunt fermentum dapibus. Nulla molestie mi vitae gravida sagittis. Nulla volutpat 
				iaculis sapien. Nulla facilisi. Nullam enim arcu, dapibus non elementum a, pellentesque eget nisi. Curabitur efficitur a odio ac 
				dignissim.',
			'after_message' => 'Pellentesque neque nisi, imperdiet nec sollicitudin in, dictum eget erat. Cras interdum risus metus, eu sagittis 
				felis gravida dignissim. Nam sed nibh pretium, mattis lorem a, vulputate neque. Nam eget blandit nisi, in rhoncus nibh. Duis et nisl ex. 
				Integer pretium ligula nec tincidunt semper. Pellentesque euismod, massa quis tempor ullamcorper, elit ligula sollicitudin massa, sit 
				amet faucibus magna mauris in dolor. Proin porttitor diam neque, facilisis rhoncus ante consequat varius. Phasellus tristique, enim non 
				pulvinar eleifend, mi velit ultrices arcu, vitae pharetra sapien nisi eget est. Ut sem ex, pharetra nec diam at, dictum ornare leo. Maecenas 
				ut orci fringilla quam venenatis volutpat non sed dolor. Nam at scelerisque diam. Quisque et imperdiet odio. Nullam faucibus magna eget 
				sollicitudin aliquam. Donec aliquam commodo tellus eu aliquet.',
			'course_id' => 1,			
        ]);
		
		$lesson = Lesson::create([			
			'title' => 'Introduction to a 90 Day Journey',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium tincidunt risus sed elementum. 
				Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis neque orci, pharetra 
				id scelerisque id, venenatis ut tellus. Mauris vestibulum massa quam, et commodo sem mattis eu. Morbi commodo, ante 
				vitae luctus tempor, metus enim rhoncus dolor, id elementum urna sapien in lorem. Curabitur vel efficitur nisi. 
				Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris id sagittis tellus, 
				id pellentesque justo. Suspendisse nec viverra ante, ac molestie lacus. Pellentesque blandit, massa eu maximus consequat, 
				turpis ex ultrices erat, non commodo nulla sapien vel lorem. Vestibulum at convallis ligula. Sed sit amet sem vulputate, 
				pulvinar magna nec, commodo lectus.',
			'type' => 2,
			'date' => date('y-m-d h:i:s',time()),
			'url' => 'http://www.google.com',
			'download_url' => 'http://www.advancedclientsystems.com/SPE01_01/application/ckeditor/ckfinder/userfiles/images/stevestage.jpg',
			'start_time' => date('y-m-d h:i:s',time()),
			'end_time' => date('y-m-d h:i:s',time()),
			'date_visible' => date('y-m-d h:i:s',time()),
			'email_on' => date('y-m-d h:i:s',time()),
			'comments_allowed' => 1,
			'before_message' => 'In ultricies finibus magna in lobortis. Sed laoreet risus mauris, nec laoreet nisl scelerisque non. 
				Integer quis turpis quis ex pretium maximus. Praesent vulputate, quam et vulputate porttitor, metus ipsum pulvinar ante, lacinia 
				tempor libero felis eu turpis. Phasellus elit purus, aliquam non dolor vitae, lobortis euismod arcu. Nunc mauris velit, ornare 
				vitae lacinia eget, blandit quis sem. In tincidunt fermentum dapibus. Nulla molestie mi vitae gravida sagittis. Nulla volutpat 
				iaculis sapien. Nulla facilisi. Nullam enim arcu, dapibus non elementum a, pellentesque eget nisi. Curabitur efficitur a odio ac 
				dignissim.',
			'after_message' => 'Pellentesque neque nisi, imperdiet nec sollicitudin in, dictum eget erat. Cras interdum risus metus, eu sagittis 
				felis gravida dignissim. Nam sed nibh pretium, mattis lorem a, vulputate neque. Nam eget blandit nisi, in rhoncus nibh. Duis et nisl ex. 
				Integer pretium ligula nec tincidunt semper. Pellentesque euismod, massa quis tempor ullamcorper, elit ligula sollicitudin massa, sit 
				amet faucibus magna mauris in dolor. Proin porttitor diam neque, facilisis rhoncus ante consequat varius. Phasellus tristique, enim non 
				pulvinar eleifend, mi velit ultrices arcu, vitae pharetra sapien nisi eget est. Ut sem ex, pharetra nec diam at, dictum ornare leo. Maecenas 
				ut orci fringilla quam venenatis volutpat non sed dolor. Nam at scelerisque diam. Quisque et imperdiet odio. Nullam faucibus magna eget 
				sollicitudin aliquam. Donec aliquam commodo tellus eu aliquet.',
			'course_id' => 2,			
        ]);
		
		$lesson = Lesson::create([			
			'title' => 'Introduction to a 90 Day Journey',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium tincidunt risus sed elementum. 
				Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis neque orci, pharetra 
				id scelerisque id, venenatis ut tellus. Mauris vestibulum massa quam, et commodo sem mattis eu. Morbi commodo, ante 
				vitae luctus tempor, metus enim rhoncus dolor, id elementum urna sapien in lorem. Curabitur vel efficitur nisi. 
				Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris id sagittis tellus, 
				id pellentesque justo. Suspendisse nec viverra ante, ac molestie lacus. Pellentesque blandit, massa eu maximus consequat, 
				turpis ex ultrices erat, non commodo nulla sapien vel lorem. Vestibulum at convallis ligula. Sed sit amet sem vulputate, 
				pulvinar magna nec, commodo lectus.',
			'type' => 3,
			'date' => date('y-m-d h:i:s',time()),
			'url' => 'http://www.google.com',
			'download_url' => 'http://www.advancedclientsystems.com/SPE01_01/application/ckeditor/ckfinder/userfiles/images/stevestage.jpg',
			'start_time' => date('y-m-d h:i:s',time()),
			'end_time' => date('y-m-d h:i:s',time()),
			'date_visible' => date('y-m-d h:i:s',time()),
			'email_on' => date('y-m-d h:i:s',time()),
			'comments_allowed' => 1,
			'before_message' => 'In ultricies finibus magna in lobortis. Sed laoreet risus mauris, nec laoreet nisl scelerisque non. 
				Integer quis turpis quis ex pretium maximus. Praesent vulputate, quam et vulputate porttitor, metus ipsum pulvinar ante, lacinia 
				tempor libero felis eu turpis. Phasellus elit purus, aliquam non dolor vitae, lobortis euismod arcu. Nunc mauris velit, ornare 
				vitae lacinia eget, blandit quis sem. In tincidunt fermentum dapibus. Nulla molestie mi vitae gravida sagittis. Nulla volutpat 
				iaculis sapien. Nulla facilisi. Nullam enim arcu, dapibus non elementum a, pellentesque eget nisi. Curabitur efficitur a odio ac 
				dignissim.',
			'after_message' => 'Pellentesque neque nisi, imperdiet nec sollicitudin in, dictum eget erat. Cras interdum risus metus, eu sagittis 
				felis gravida dignissim. Nam sed nibh pretium, mattis lorem a, vulputate neque. Nam eget blandit nisi, in rhoncus nibh. Duis et nisl ex. 
				Integer pretium ligula nec tincidunt semper. Pellentesque euismod, massa quis tempor ullamcorper, elit ligula sollicitudin massa, sit 
				amet faucibus magna mauris in dolor. Proin porttitor diam neque, facilisis rhoncus ante consequat varius. Phasellus tristique, enim non 
				pulvinar eleifend, mi velit ultrices arcu, vitae pharetra sapien nisi eget est. Ut sem ex, pharetra nec diam at, dictum ornare leo. Maecenas 
				ut orci fringilla quam venenatis volutpat non sed dolor. Nam at scelerisque diam. Quisque et imperdiet odio. Nullam faucibus magna eget 
				sollicitudin aliquam. Donec aliquam commodo tellus eu aliquet.',
			'course_id' => 3,			
        ]);
		
    }

}