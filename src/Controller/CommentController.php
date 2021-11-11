<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment/{id}", name="comment", methods={"POST", "GET"})
     */
    public function new(Request $request, Trick $trick): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment, [
            'action' => $this->generateUrl('comment', ['id' => $trick->getId()])
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setTrick($trick);
            $comment->setUser($this->getUser());
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Comment created successfuly');
            return $this->redirectToRoute('trick_show', [
                'slug' => $trick->getSlug(),
                'trick_group_slug' => $trick->getTrickGroup()->getSlug()
            ]);
        }

        return $this->render('comment/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
