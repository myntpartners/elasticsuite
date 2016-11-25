<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Smile Elastic Suite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\ElasticsuiteCore
 * @author    Fanny DECLERCK <fadec@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\ElasticsuiteCore\Search\Request\Query;

use Smile\ElasticsuiteCore\Search\Request\QueryInterface;

/**
 * Query negation definition implementation.
 *
 * @category Smile
 * @package  Smile\ElasticsuiteCore
 * @author   Fanny DECLERCK <fadec@smile.fr>
 */
class FunctionScore implements QueryInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $boost;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * @var string
     */
    private $boostMode;

    /**
     * @var array
     */
    private $functionScore;

    /**
     * Score mode functions.
     */
    const SCORE_MODE_MULTIPLY = 'multiply';
    const SCORE_MODE_SUM      = 'sum';
    const SCORE_MODE_AVG      = 'AVG';
    const SCORE_MODE_FIRST    = 'first';
    const SCORE_MODE_MAX      = 'max';
    const SCORE_MODE_MIN      = 'min';

    /**
     * Boost mode functions.
     */
    const BOOST_MODE_MULTIPLY = 'multiply';
    const BOOST_MODE_SUM      = 'sum';
    const BOOST_MODE_AVG      = 'AVG';
    const BOOST_MODE_FIRST    = 'first';
    const BOOST_MODE_MAX      = 'max';
    const BOOST_MODE_MIN      = 'min';

    /**
     * Functions score list.
     */
    const FUNCTION_SCORE_SCRIPT_SCORE       = 'script_score';
    const FUNCTION_SCORE_WEIGHT             = 'weight';
    const FUNCTION_SCORE_RANDOM_SCORE       = 'random_score';
    const FUNCTION_SCORE_FIELD_VALUE_FACTOR = 'field_value_factor';

    /**
     * Constructor.
     * @param \Magento\Framework\Search\Request\QueryInterface $query         Negated query.
     * @param string                                           $name          Query name.
     * @param integer                                          $boost         Query boost.
     * @param string                                           $scoreMode     Score mode.
     * @param string                                           $boostMode     Boost mode.
     * @param array                                            $functionScore Function score.
     */
    public function __construct(
        \Magento\Framework\Search\Request\QueryInterface $query = null,
        $name = null,
        $boost = QueryInterface::DEFAULT_BOOST_VALUE,
        $scoreMode = self::SCORE_MODE_SUM,
        $boostMode = self::BOOST_MODE_MULTIPLY,
        $functionScore = []
    ) {
        $this->name          = $name;
        $this->boost         = $boost;
        $this->query         = $query;
        $this->scoreMode     = $scoreMode;
        $this->boostMode     = $boostMode;
        $this->functionScore = $functionScore;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return QueryInterface::TYPE_FUNCTIONSCORE;
    }

    /**
     * Returns score mode.
     *
     * @return string
     */
    public function getScoreMode()
    {
        return $this->scoreMode;
    }

    /**
     * Returns boost mode.
     *
     * @return string
     */
    public function getBoostMode()
    {
        return $this->boostMode;
    }

    /**
     * Returns function score.
     *
     * @return array
     */
    public function getFunctionScore()
    {
        return $this->functionScore;
    }
}