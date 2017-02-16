<?php
session_start();
include '../conn.php';
$id = $_SESSION['id'];
if(isset($_POST['part']) && isset($_POST['like_dislike']))
{
	$post_id = $_POST['part'];
	$like_dislike = $_POST['like_dislike'];
	//echo $like_dislike;
	if($like_dislike == "like")
	{
		$like_search_sql = "SELECT `liked_by` FROM `posts` WHERE `id`=$post_id";
		$like_search_result = mysqli_query($conn,$like_search_sql);
		$like_search_row = mysqli_fetch_assoc($like_search_result);
		$liked_by = $like_search_row['liked_by'];
		$found = strpos($liked_by, $id);
		if($found)
		{
			//echo "already liked";
			$likers = array();
			$likers = explode(',', $liked_by);
			$updated_likers = array();
			for($i=0,$j=0; $i<count($likers); $i++)
			{
				if($likers[$i]==$id)
				{
					continue;
				}
				else 
				{
					$updated_likers[$j]=$likers[$i];
					$j++;

				}
			}
			//for($i=0; $i<count($updated_likers); $i++)
				//echo $updated_likers[$i]." ";
			$str = implode(',', $updated_likers);
			if(sizeof($updated_likers)-1==0)
				$like_sql = "UPDATE `posts` SET `liked_by`= NULL  WHERE `id`=$post_id";
			else $like_sql = "UPDATE `posts` SET `liked_by`= '$str' WHERE `id`=$post_id";			
			$like_result = mysqli_query($conn,$like_sql);
			if($like_result)
			{
				$like_search_sql = "SELECT `liked_by` FROM `posts` WHERE `id`=$post_id";
				$like_search_result = mysqli_query($conn,$like_search_sql);
				$like_search_row = mysqli_fetch_assoc($like_search_result);
				$like_array = array();
				$like_array = explode(',', $like_search_row['liked_by']);
				echo "unliked";
				echo count($like_array)-1;
				$like_posts_search_sql = "SELECT `liked_posts` FROM `user_data` WHERE `id`=$id";
				$like_posts_search_result = mysqli_query($conn,$like_posts_search_sql);
				if($like_posts_search_result)
				{
					$liked_posts_row = mysqli_fetch_assoc($like_posts_search_result);
					$liked_posts = $liked_posts_row['liked_posts'];
					$liked_posts_array = array();
					$liked_posts_array = explode(',', $liked_posts);
					$liked_posts_array_updated = array();
					$j=0;
					for($i=0;$i<count($liked_posts_array);$i++)
					{
						if($liked_posts_array[$i]==$post_id)
							continue;
						else 
						{
							$liked_posts_array_updated[$j]=$liked_posts_array[$i];
							$j++;

						}
					}
					$updated_liked_posts = implode(',', $liked_posts_array_updated);
					if(sizeof($liked_posts_array_updated)-1==0)
						$update_like_posts_sql = "UPDATE `user_data` SET `liked_posts`= NULL WHERE `id`=$id";
					else $update_like_posts_sql = "UPDATE `user_data` SET `liked_posts`= '$updated_liked_posts' WHERE `id`=$id";					
					$updated_liked_posts_result = mysqli_query($conn,$update_like_posts_sql);

				}

			}
			else echo mysqli_error($conn);
		}
		else 
		{
			$like_sql = "UPDATE `posts` SET `liked_by` = IFNULL(concat(`liked_by`,',$id'),',$id') WHERE `id`=$post_id";
			$like_result = mysqli_query($conn,$like_sql);

			$like_posts_search_sql = "SELECT `liked_posts` FROM `user_data` WHERE `id`=$id";
			$like_posts_search_result = mysqli_query($conn,$like_posts_search_sql);
			if($like_posts_search_result)
			{
				$liked_posts_row = mysqli_fetch_assoc($like_posts_search_result);
				$liked_posts = $liked_posts_row['liked_posts'];
				$liked_posts_array = array();
				$liked_posts_array = explode(',', $liked_posts);
				$post_search =  array_search($post_id, $liked_posts_array);
				if($post_search)
				{
					//echo "already liked";

				}
				else 
				{
					$like_sql_on_user = "UPDATE `user_data` SET `liked_posts` = IFNULL(concat(`liked_posts`,',$post_id'),',$post_id') WHERE `id`=$id";

					$like_result_on_user = mysqli_query($conn,$like_sql_on_user);

				}


			}
			
			if($like_result)
			{
				$like_search_sql = "SELECT `liked_by` FROM `posts` WHERE `id`=$post_id";
				$like_search_result = mysqli_query($conn,$like_search_sql);
				$like_search_row = mysqli_fetch_assoc($like_search_result);
				$like_array = array();
				$like_array = explode(',', $like_search_row['liked_by']);
				echo "liked";
				echo count($like_array)-1;
			}
			else echo mysqli_error($conn);


		}
	}

	else if($like_dislike == "dislike")
		{
		$dislike_search_sql = "SELECT `disliked_by` FROM `posts` WHERE `id`=$post_id";
		$dislike_search_result = mysqli_query($conn,$dislike_search_sql);
		$dislike_search_row = mysqli_fetch_assoc($dislike_search_result);
		$disliked_by = $dislike_search_row['disliked_by'];
		$found = strpos($disliked_by, $id);
		if($found)
		{
			//echo "already liked";
			$dislikers = array();
			$dislikers = explode(',', $disliked_by);
			$updated_dislikers = array();
			for($i=0,$j=0; $i<count($dislikers); $i++)
			{
				if($dislikers[$i]==$id)
				{
					continue;
				}
				else 
				{
					$updated_dislikers[$j]=$dislikers[$i];
					$j++;

				}
			}

			$str = implode(',', $updated_dislikers);
			if(sizeof($updated_dislikers)-1==0)
				$dislike_sql = "UPDATE `posts` SET `disliked_by`= NULL  WHERE `id`=$post_id";
			else $dislike_sql = "UPDATE `posts` SET `disliked_by`= '$str' WHERE `id`=$post_id";			//echo $str;
			$dislike_result = mysqli_query($conn,$dislike_sql);
			if($dislike_result)
			{
				$dislike_search_sql = "SELECT `disliked_by` FROM `posts` WHERE `id`=$post_id";
				$dislike_search_result = mysqli_query($conn,$dislike_search_sql);
				$dislike_search_row = mysqli_fetch_assoc($dislike_search_result);
				$dislike_array = array();
				$dislike_array = explode(',', $dislike_search_row['disliked_by']);
				echo "not_disliked";
				echo count($dislike_array)-1;
				$dislike_posts_search_sql = "SELECT `disliked_posts` FROM `user_data` WHERE `id`=$id";
				$dislike_posts_search_result = mysqli_query($conn,$dislike_posts_search_sql);
				if($dislike_posts_search_result)
				{
					$disliked_posts_row = mysqli_fetch_assoc($dislike_posts_search_result);
					$disliked_posts = $disliked_posts_row['disliked_posts'];
					$disliked_posts_array = array();
					$disliked_posts_array = explode(',', $disliked_posts);
					$disliked_posts_array_updated = array();
					$j=0;
					for($i=0;$i<count($disliked_posts_array);$i++)
					{
						if($disliked_posts_array[$i]==$post_id)
							continue;
						else 
						{
							$disliked_posts_array_updated[$j]=$disliked_posts_array[$i];
							$j++;

						}
					}

					$updated_disliked_posts = implode(',', $disliked_posts_array_updated);
					if(sizeof($disliked_posts_array_updated)-1==0)
						$update_dislike_posts_sql = "UPDATE `user_data` SET `disliked_posts`= NULL WHERE `id`=$id";
					else $update_dislike_posts_sql = "UPDATE `user_data` SET `disliked_posts`= '$updated_disliked_posts' WHERE `id`=$id";
					$updated_disliked_posts_result = mysqli_query($conn,$update_dislike_posts_sql);

				}

			}
			else echo mysqli_error($conn);
		}
		else 
		{
			$dislike_sql = "UPDATE `posts` SET `disliked_by` = IFNULL(concat(`disliked_by`,',$id'),',$id') WHERE `id`=$post_id";
			$dislike_result = mysqli_query($conn,$dislike_sql);

			$dislike_posts_search_sql = "SELECT `disliked_posts` FROM `user_data` WHERE `id`=$id";
			$dislike_posts_search_result = mysqli_query($conn,$dislike_posts_search_sql);
			if($dislike_posts_search_result)
			{
				$disliked_posts_row = mysqli_fetch_assoc($dislike_posts_search_result);
				$disliked_posts = $disliked_posts_row['disliked_posts'];
				$disliked_posts_array = array();
				$disliked_posts_array = explode(',', $disliked_posts);
				$post_search =  array_search($post_id, $disliked_posts_array);
				if($post_search)
				{
					//echo "already liked";

				}
				else 
				{
					$dislike_sql_on_user = "UPDATE `user_data` SET `disliked_posts` = IFNULL(concat(`disliked_posts`,',$post_id'),',$post_id') WHERE `id`=$id";					
					$dislike_result_on_user = mysqli_query($conn,$dislike_sql_on_user);

				}


			}
			
			if($dislike_result)
			{
				$dislike_search_sql = "SELECT `disliked_by` FROM `posts` WHERE `id`=$post_id";
				$dislike_search_result = mysqli_query($conn,$dislike_search_sql);
				$dislike_search_row = mysqli_fetch_assoc($dislike_search_result);
				$dislike_array = array();
				$dislike_array = explode(',', $dislike_search_row['disliked_by']);
				echo "disliked";
				echo count($dislike_array)-1;
			}
			else echo mysqli_error($conn);


		}
	}
}
else echo "bal";






?>