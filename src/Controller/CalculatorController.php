<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', name: 'app_calculator')]
    public function index(Request $request): Response
    {
        $result = null;

        if ($request->isMethod('POST')) {
            $operand_1 = $request->request->get('operand_1');
            $operand_2 = $request->request->get('operand_2');
            $operator = $request->request->get('operator');

            switch ($operator) {
                
                case 'add':
                    $result = $operand_1 + $operand_2;
                    break;
                case 'subtract':
                    $result = $operand_1 - $operand_2;
                    break;
                case 'multiply':
                    $result = $operand_1 * $operand_2;
                    break;
                case 'divide':
                    if ($operand_2 != 0) {
                        $result = $operand_1 / $operand_2;
                    } else {
                        $result = 'error: Division by zero';
                    }
                    break;
                default:
                    $result = 'Invalid operator';
            }
        }
            
        
        return $this->render('calculator/index.html.twig', [
            'result' => $result,
         ]);
    }
}
