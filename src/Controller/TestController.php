<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TestController
{
    #[Route("/", name: "app_test")]
    public function __invoke(Request $request): Response
    {
        $form = '<form><button type="submit">Submit</form>';

        return new Response($form . ($request->query->has('foo') ? 'YAY' : 'NAY'));
    }
}
