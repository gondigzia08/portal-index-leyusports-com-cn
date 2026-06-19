<?php

/**
 * Site meta information handler for portal-index-leyusports.com.cn
 *
 * This file provides a structured array of site metadata and a simple method
 * to generate a short descriptive text for the given site context.
 */

// Site metadata array containing basic info for portal-index-leyusports.com.cn
$siteMeta = [
    'site_name'        => '乐鱼体育',
    'site_url'         => 'https://portal-index-leyusports.com.cn',
    'description'      => '乐鱼体育 - 专业的体育资讯与赛事数据平台',
    'keywords'         => ['乐鱼体育', '体育资讯', '赛事数据', '体育平台'],
    'language'         => 'zh-CN',
    'charset'          => 'UTF-8',
    'author'           => 'portalleague',
    'version'          => '1.0.2',
    'last_updated'     => '2025-02-18',
    'meta_tags'        => [
        'viewport'           => 'width=device-width, initial-scale=1.0',
        'robots'             => 'index, follow',
        'og:title'           => '乐鱼体育',
        'og:description'     => '乐鱼体育 - 专业的体育资讯与赛事数据平台',
        'og:url'             => 'https://portal-index-leyusports.com.cn',
        'twitter:card'       => 'summary_large_image',
        'twitter:site'       => '@portal_leyu',
    ],
    'contact'          => [
        'support_email' => 'support@portal-index-leyusports.com.cn',
        'support_phone' => '+86-400-123-4567',
    ],
    'social_links'     => [
        'weibo'  => 'https://weibo.com/leyusports',
        'wechat' => 'https://weixin.qq.com/leyusports',
        'douyin' => 'https://douyin.com/leyusports',
    ],
    'features'         => [
        'live_scores'       => true,
        'news_feed'         => true,
        'user_comments'     => false,
        'multi_language'    => false,
    ],
    'theme_settings'   => [
        'primary_color'   => '#1a73e8',
        'secondary_color' => '#ff6f00',
        'font_family'     => 'Arial, sans-serif',
        'logo_url'        => 'https://portal-index-leyusports.com.cn/images/logo.png',
    ],
    'seo_settings'     => [
        'enable_sitemap'  => true,
        'enable_robots'   => true,
        'google_analytics_id' => 'UA-XXXXX-Y',
    ],
];

/**
 * Generate a short description text for the site using the metadata array.
 *
 * This function constructs a concise, readable summary string that can be used
 * in meta tags, page titles, or simple displays.
 *
 * @param array $meta   The site metadata array.
 * @param int   $maxLen Maximum length of the generated text (default 120 characters).
 * @return string       The generated description text.
 */
function generateShortDescription(array $meta, int $maxLen = 120): string
{
    // Base description using available fields
    $name = $meta['site_name'] ?? 'Unknown Site';
    $desc = $meta['description'] ?? 'No description available.';
    $url  = $meta['site_url'] ?? '';

    // Add keyword highlights if available
    $keywords = $meta['keywords'] ?? [];
    $keywordStr = '';
    if (!empty($keywords)) {
        $keywordStr = '关键词：' . implode('、', array_slice($keywords, 0, 3)) . '。';
    }

    // Build the raw text
    $rawText = sprintf(
        '%s - %s %s访问地址：%s',
        $name,
        $desc,
        $keywordStr,
        $url
    );

    // Trim to max length, preserving whole words if possible
    $trimmed = mb_substr($rawText, 0, $maxLen, 'UTF-8');

    // If we cut mid-word, find last space to break cleanly (handle multi-byte)
    if (mb_strlen($rawText, 'UTF-8') > $maxLen) {
        $lastSpace = mb_strrpos($trimmed, ' ', 0, 'UTF-8');
        if ($lastSpace !== false) {
            $trimmed = mb_substr($trimmed, 0, $lastSpace, 'UTF-8');
        }
    }

    return $trimmed;
}

// --- Example usage (uncomment to test) ---
/*
$shortDesc = generateShortDescription($siteMeta);
echo $shortDesc . "\n";
// Output example:
// 乐鱼体育 - 乐鱼体育 - 专业的体育资讯与赛事数据平台 关键词：乐鱼体育、体育资讯、赛事数据。访问地址：https://portal-index-leyusports.com.cn
*/