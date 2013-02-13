<?php

namespace Fuel\Tasks;

/**
 * Populate task
 *
 * Task that will add fixtures for the blog application 
 *
 * @package		Fuel
 * @version		1.0
 * @author		anothertestaccount
*/


class Populate
{
	/**
	 * This method is for populating posts table.
	 *
	 * Usage (from run function):
	 *
	 * self::populate_posts();
	 */
	private static function populate_posts()
	{
		$post=Model_Post::forge(array(
			'name' => 'cum-sociis',
			'title' => 'cum sociis',
			'body_short' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 
			'body' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
			'status' => 1,
			'category_id' => 2,
			'language_id' => 2,
		));

		$post->save();

		$post=Model_Post::forge(array(
			'name' => 'cum-sociia',
			'title' => 'cum sociia',
			'body_short' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 
			'body' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
			'status' => 1,
			'category_id' => 2,
			'language_id' => 2,
		));

		$post->save();

		$post=Model_Post::forge(array(
			'name' => 'cum-sociib',
			'title' => 'cum sociib',
			'body_short' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 
			'body' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
			'status' => 1,
			'category_id' => 2,
			'language_id' => 2,
		));

		$post->save();
	}

	/**
	 * This method is for populating categories table.
	 *
	 * Usage (from run function):
	 *
	 * self::populate_categories();
	 */
	private static function populate_categories()
	{
		$category=Model_Category::forge(array(
			'name' => 'parent',
			'title' => 'parent',
			'parent_id' => NULL,
			'lft' => 1,
			'rght' => 4,
			'status' => 1,
		));

		$category->save();

		$category=Model_Category::forge(array(
			'name' => 'news',
			'title' => 'news',
			'parent_id' => 1,
			'lft' => 2,
			'rght' => 3,
			'status' => 1,
		));

		$category->save();
	}

	/**
	 * This method is for populating languages table.
	 *
	 * Usage (from run function):
	 *
	 * self::populate_languages();
	 */
	private static function populate_languages()
	{
		$language=Model_Language::forge(array(
			'name' => 'sr',
			'status' => 1
		));

		$language->save();

		$language=Model_Language::forge(array(
			'name' => 'eng',
			'status' => 2
		));

		$language->save();
	}

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil refine populate
	 */
	public static function run()
	{
		self::populate_posts();
		self::populate_categories();
		self::populate_languages();
			
	}
}

/* End of file tasks/populate.php */