<?php

namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractManager
{
    private $em;

    private $repository;

    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    public function setManager(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getManager(): EntityManagerInterface
    {
        return $this->em;
    }

    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param mixed $entity
     * @return mixed
     */
    public function delete($entity)
    {
        if (is_array($entity)) {
            foreach ($entity as $e) {
                $this->delete($e);
            }
        } else {
            if (is_object($entity)) {
                $em = $this->getManager();
                $em->remove($entity);
                $em->flush();
            }
        }
        return $entity;
    }
    /**
     * @param $entity
     * @return mixed
     */
    public function persist($entity)
    {
        if (is_object($entity))
        {
            $em = $this->getManager();
            $em->persist($entity);
        }
        return $entity;
    }

    /**
     * @param mixed $entity
     * @return mixed
     */
    public function update($entity)
    {
        if (is_object($entity)) {
            $em = $this->getManager();
            $em->persist($entity);
            $em->flush();
        }
        return $entity;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $id = (int)$id;
        return $id ? $this->getRepository()->find($id) : null;
    }

    public function flush()
    {
        $em = $this->getManager();
        $em->flush();
    }

    /**
     * @return object[]
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @param array $criteria
     * @return mixed
     */
    public function findBy(array $criteria)
    {
        return $this->getRepository()->findBy($criteria);
    }
}
