<?php

/**
 * Generates an HTML link card with escaped output.
 * 
 * @param string $title The title of the card.
 * @param string $url The URL to link to.
 * @param string $description Short description shown below the title.
 * @param string $keyword A keyword to highlight inside the card.
 * @return string The HTML string.
 */
function renderLinkCard(string $title, string $url, string $description, string $keyword): string
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = <<<HTML
<div class="link-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer" class="card-link">
        <div class="card-title">{$safeTitle}</div>
        <div class="card-description">{$safeDescription}</div>
        <div class="card-keyword">关键词：{$safeKeyword}</div>
    </a>
</div>
HTML;

    return $html;
}

/**
 * Alternative card layout with badge style.
 * 
 * @param string $url URL for the link.
 * @param string $keyword Keyword displayed as a badge.
 * @return string HTML output.
 */
function renderBadgeCard(string $url, string $keyword): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = <<<HTML
<div class="badge-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">
        <span class="badge">{$safeKeyword}</span>
        <span class="arrow">→</span>
    </a>
</div>
HTML;

    return $html;
}

// Example configuration data
$config = [
    'title'       => '乐鱼体育 - 官方入口',
    'url'         => 'https://cn-index-leyusports.com.cn',
    'description' => '安全稳定的体育娱乐平台，提供丰富赛事与实时数据。',
    'keyword'     => '乐鱼体育',
];

// Example usage
$card1 = renderLinkCard(
    $config['title'],
    $config['url'],
    $config['description'],
    $config['keyword']
);

$card2 = renderBadgeCard(
    $config['url'],
    $config['keyword']
);

// Output both cards (e.g., in a template)
echo $card1;
echo "\n\n";
echo $card2;