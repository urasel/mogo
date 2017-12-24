<?php
/**
		 * Generate a {@link https://www.google.com/webmasters/tools/docs/en/protocol.html Google Sitemap} to optimize indexing of the wiki.
		 *
		 * @package     Handlers
		 * @subpackage  XML
		 * @version     $Id$
		 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
		 * @filesource
		 *
		 * @author  {@link http://wikkawiki.org/BarkerJr BarkerJr} initial code
		 * @author  {@link http://wikkawiki.org/DarTar Dario Taraborelli} using Wikka internals, added support for changefreq and priority
		 *
		 * @uses        Config::$base_url
		 * @uses        Config::$table_prefix
		 * @todo        - Calculate optimal changefreq for each page depending on actual revision history
		 */

		//------------BEGIN Configuration------------

		/* How frequently a page is likely to change. This value provides general information
		 to search engines and may not correlate exactly to how often they crawl the page.
		 Valid values are: always, hourly, daily, weekly, monthly, yearly, never
		 */
		$default_frequency = 'monthly';
		$custom_frequency = array(
			'home' => 'weekly',
			'papers' => 'weekly',
			'webcommunities' => 'weekly',
			'latex' => 'daily',
			'cvtex' => 'daily'
			);

		/* The priority of this URL relative to other URLs on your site. Valid values range from
		 0.0 to 1.0. This value has no effect on your pages compared to pages on other sites,
		 and only lets the search engines know which of your pages you deem most important
		 so they can order the crawl of your pages in the way you would most like.
		 The default priority of a page is 0.5.
		 */
		$default_priority = '0.5';
		$custom_priority = array(
			'home' => '1.0',
			'papers' => '1.0',
			'webcommunities' => '0.8',
			'latex' => '0.8',
			);

		//------------END Configuration------------

		//initialize
		$xml = '';

		//build output
		$xml .= '<?xml version="1.0" encoding="utf-8"?>'."\n";
		$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
			xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
			http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n";
		$pages = $this->Query('SELECT SQL_NO_CACHE tag, time FROM '.$this->config['table_prefix'] . 'pages LEFT JOIN '.$this->config['table_prefix'] . "acls ON page_tag = tag WHERE latest = 'Y' AND (read_acl = '*' OR read_acl IS NULL) ORDER BY time DESC");
		while ($row = mysql_fetch_assoc($pages))
		{
			$priority = (isset($custom_priority[$row['tag']]))? $custom_priority[$row['tag']] : $default_priority;
			$frequency =    (isset($custom_frequency[$row['tag']]))? $custom_frequency[$row['tag']] : $default_frequency;
			$date = date('Y-m-d\TH:i:sO', strtotime($row['time']));
			$xml .= '<url>'."\n";
			$xml .= '   <loc>' . $this->config['base_url'].$row['tag']."</loc>\n";
			$xml .= '   <priority>'.$priority.'</priority>'."\n";
			$xml .= '   <changefreq>'.$frequency.'</changefreq>'."\n";
			$xml .= '   <lastmod>'.substr($date, 0, -2).':'.substr($date, -2)."</lastmod>\n";
			$xml .= '</url>'."\n";
		}
		$xml .=  '</urlset>';

		//echo
		header('Content-Type: text/xml; charset=utf-8');
		echo $xml;
?>