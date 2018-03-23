<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 15:44
 */

namespace DemoBundle\Command;


use DemoBundle\Entity\BrowserLog;
use DemoBundle\Entity\RequestLog;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportDataFromLogs extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
          ->setName('demo:import_logs_data')
          ->setDescription('Import data from logs');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        $requestLogs = [];
        $requestLogsCount = 0;
        if (($handle = fopen(__DIR__ . "/../../config/inputData/request.log",
            "r")) !== false) {
            $output->writeln("Начинаем читать request.log файл!");
            while (($line = fgets($handle)) !== false) {
                $data = explode('|', $line);
                $requestLogsCount++;
                $requestLogs[] = [
                  "requestDate" => \DateTime::createFromFormat('d.m.Y H:i',
                    $data[0] . ' ' . $data[1]),
                  "ip" => $data[2],
                  "requestUrl" => $data[3],
                  "responseUrl" => $data[4],
                ];
            }
            fclose($handle);
            $output->writeln("Найдено " . $requestLogsCount . " записей!");
            if (!empty($requestLogs)) {
                foreach ($requestLogs as $log) {
                    $requestLog = new RequestLog();
                    $requestLog->setRequestDate($log['requestDate']);
                    $requestLog->setIp($log['ip']);
                    $requestLog->setRequestUrl($log['requestUrl']);
                    $requestLog->setResponseUrl($log['responseUrl']);
                    $em->persist($requestLog);
                }
            }
        } else {
            $output->writeln("Не удалось прочитать browser.log файл!");
        }

        try {
            $em->flush();
            $output->writeln("Импорт реквест лога успешно завершился !");
        } catch (\Exception $e) {
            $output->writeln("Произошла ошибка: " . $e->getMessage());
        }

        $browserLogs = [];
        $browserLogsCount = 0;
        if (($handle = fopen(__DIR__ . "/../../config/inputData/browser.log",
            "r")) !== false) {
            $output->writeln("Начинаем читать browser.log файл!");
            while (($line = fgets($handle)) !== false) {
                $data = explode('|', $line);
                $browserLogsCount++;
                $browserLogs[] = [
                  "ip" => $data[0],
                  "browser" => $data[1],
                  "operationSystem" => $data[2],
                ];

            }
            fclose($handle);
            $output->writeln("Найдено " . $browserLogsCount . " записей!");
            if (!empty($browserLogs)) {
                foreach ($browserLogs as $log) {
                    $browserLog = new BrowserLog();
                    $browserLog->setIp($log['ip']);
                    $browserLog->setBrowser($log['browser']);
                    $browserLog->setOperatingSystem($log['operationSystem']);
                    $em->persist($browserLog);
                }
            }
        } else {
            $output->writeln("Не удалось прочитать browser.log файл!");
        }

        try {
            $em->flush();
            $output->writeln("Импорт браузер лога успешно завершился !");
        } catch (\Exception $e) {
            $output->writeln("Произошла ошибка: " . $e->getMessage());
        }
    }
}