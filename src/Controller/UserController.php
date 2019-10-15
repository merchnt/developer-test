<?php
namespace DeveloperTest\Controller;

use DeveloperTest\Manager\UserManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

final class UserController extends Controller
{
    /**
     * @param Request $request
     * @return false|string
     */
    public function indexAction(Request $request)
    {
        return $this->render('index.php', [
            'users' => (new UserManager())->getUsers()
        ]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function formAction(Request $request)
    {
        if (!is_null($request->get('id'))) {
            $user = (new UserManager())->getUser($request->get('id'));
            if ($user === false) {
                throw new BadRequestHttpException('User could not be found.', null, 404);
            }

            return $this->render('form.php', [
                'user' => $user
            ]);
        }

        return $this->render('form.php');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        $userManager = new UserManager();
        $user = $userManager->createUser(
            $request->get('first_name'),
            $request->get('surname'),
            $request->get('email'),
            $request->get('username'),
            $request->get('password')
        );

        return new JsonResponse($user);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        $userManager = new UserManager();
        $result = $userManager->updateUser(
            $request->get('id'),
            $request->get('first_name'),
            $request->get('surname'),
            $request->get('email'),
            $request->get('username'),
            $request->get('password')
        );

        return new JsonResponse(['result' => $result]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        $userManager = new UserManager();
        $result = $userManager->deleteUser($request->get('id'));

        return new JsonResponse(['result' => $result]);
    }
}