<?php
class Controller_User extends Controller_Right 
{
	public function before()
	{
		parent::before();
	}


	public function action_index()
	{
		$pagination=Pagination::forge('pagination', array(
			'pagination_url' => Uri::base(false).'user/index/',
			'total_items' => Model_User::count(array()),
			'per_page' => Config::get('application_settings.pagination_items'),
			'uri_segment' => Config::get('application_settings.pagination_uri_segment'),
			'num_links' => Config::get('application_settings.pagination_num_links')
		));

		$data['users'] = Model_User::find('all',array(
			'order_by' => array(
				'id' => 'desc'
			),
			'offset' => $pagination->offset,
			'limit' => $pagination->per_page
		));
		$data['pagination']=$pagination->render();
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('User');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			
			if ($val->run())
			{
				if ($user=Model_User::add())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('user');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('User');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->password = Input::post('password');
			$user->email = Input::post('email');
			$user->status = Input::post('status');
			$user->level = Input::post('level');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('user');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->email = $val->validated('email');
				$user->status = $val->validated('status');
				$user->level = $val->validated('level');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}


}
