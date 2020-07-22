<?php
class NotFound extends Controller {
  public function NotFoundPage() {
    $this -> view("NotFoundPage",["Dashboard" => $this->dashboard]);
  }
}

?>