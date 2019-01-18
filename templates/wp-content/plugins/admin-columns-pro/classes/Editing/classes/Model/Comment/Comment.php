<?php

namespace ACP\Editing\Model\Comment;

use ACP\Editing\Model;

class Comment extends Model {

	public function get_edit_value( $id ) {
		$comment = get_comment( $id );

		return $comment->comment_content;
	}

	public function get_view_settings() {
		return array(
			'type' => 'textarea',
		);
	}

	public function save( $id, $value ) {
		$this->strategy->update( $id, array( 'comment_content' => $value ) );
	}

}