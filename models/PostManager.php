<?php


class PostManager extends Model
{

  //create the function that will recover
  // all the articles in the database
  public function getPosts(){
    return $this->getAll('posts', 'Post');
  }

  public function getPost($id){
    return $this->getOne('posts', 'Post', $id);
  }
  
}


