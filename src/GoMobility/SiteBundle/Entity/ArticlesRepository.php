<?php

namespace GoMobility\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ArticlesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticlesRepository extends EntityRepository
{
    /**
     * Renvoit la pagination pour les articles
     *
     * @param  int    $page
     * @param  int    $maxperpage
     * @param  string $sortby
     * @return Paginator
     */
    public function getList($page=1, $maxperpage=2)
    {
        $q = $this->_em->createQueryBuilder()
            ->select('articles')
            ->from('GoMobilitySiteBundle:Articles','articles')
            ->where('articles.status = 1')
        ;
 
        $q->setFirstResult(($page-1) * $maxperpage)
            ->setMaxResults($maxperpage);
 
        return new Paginator($q);
    }

    /**
     * Renvoit les dernières articles ayant pour status publié
     * @param  $nbArticles
     * @return $articles
     */
    public function getLastExperiences($nbArticles)
    {
        $q = $this->_em->createQueryBuilder()
            ->select('articles')
            ->from('GoMobilitySiteBundle:Articles','articles')
            ->where('articles.status = 1')
            ->add('orderBy', 'articles.id DESC')
            ->getQuery();
        ;
 
        $q->setFirstResult(0)
            ->setMaxResults($nbArticles);
    
        return $q->getResult();
    }

}
