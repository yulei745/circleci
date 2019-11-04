<?php

$header = <<<'EOF'
Discuz & Tencent Cloud
This is NOT a freeware, use is subject to license terms

$Id: CreateThreadController.php xxx 2019-10-10 11:08:00 LiuDongdong $
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(__DIR__.'/vendor')
    ->name('*.php');
;
$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        'header_comment' => ['header' => $header],
        '@PSR2' => true,
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => false,
        'concat_space' => ['spacing'=>'one'],
    ])
    ->setFinder($finder)
;
// special handling of fabbot.io service if it's using too old PHP CS Fixer version
if (false !== getenv('FABBOT_IO')) {
    try {
        PhpCsFixer\FixerFactory::create()
            ->registerBuiltInFixers()
            ->registerCustomFixers($config->getCustomFixers())
            ->useRuleSet(new PhpCsFixer\RuleSet($config->getRules()));
    } catch (PhpCsFixer\ConfigurationException\InvalidConfigurationException $e) {
        $config->setRules([]);
    } catch (UnexpectedValueException $e) {
        $config->setRules([]);
    } catch (InvalidArgumentException $e) {
        $config->setRules([]);
    }
}
return $config;