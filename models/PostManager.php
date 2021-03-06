<?php


class PostManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getPosts()
  {
    return $this->getAll('posts', 'Post');
  }

  public function getPost($id)
  {
    return $this->getOne('posts', 'Post', $id);
  }

  public function getAllPostsInfo()
  {
    return $this->getAllPostsInfos();
  }

  public function newPost($title, $chapo, $content, $date, $auteur_id, $auteur)
  {
    return $this->createPost($title, $chapo, $content, $date, $auteur_id, $auteur);
  }

  public function deleteAPost($id)
  {
    return $this->erasePost($id);
  }

  public function updatePost($id, $chapo, $content, $date, $title)
  {
    return $this->updateAPost($id, $chapo, $content, $date, $title);
  }
}
