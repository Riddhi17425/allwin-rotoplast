<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;

class SitemapController extends Controller
{
    // RETURN XML RESPONSE
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function index()
    {
        $todayTime = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. HOMEPAGE
        $xml .= '<url>';
        $xml .= '<loc>'
            . htmlspecialchars(
                url('/'),
                ENT_XML1,
                'UTF-8'
            )
            . '</loc>';
        $xml .= '<lastmod>'
            . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
            . '</lastmod>';
        $xml .= '<priority>1.00</priority>';
        $xml .= '</url>' . "\n";

        // 2. ALL CATEGORIES
        $categories = Category::whereNotNull('category_name')
            ->where('category_name', '!=', '')
            ->get();

        foreach ($categories as $category)
        {
            if (empty($category->category_name))
            {
                continue;
            }

            // Convert category name into URL format
            $categorySlug = strtolower(
                trim(
                    preg_replace(
                        '/[^A-Za-z0-9]+/',
                        '-',
                        $category->category_name
                    ),
                    '-'
                )
            );

            if (empty($categorySlug))
            {
                continue;
            }

            $loc = url('/product-list/' . $categorySlug);
            $lastmod = optional($category->updated_at)->toAtomString();
            $xml .= '<url>';
            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';
            $xml .= '</url>' . "\n";
        }

        // 3. ALL PRODUCTS
        $products = Product::join(
                'categories',
                'categories.id',
                '=',
                'product.category_id'
            )
            ->whereNotNull('product.producturl')
            ->where('product.producturl', '!=', '')
            ->whereNotNull('categories.category_name')
            ->where('categories.category_name', '!=', '')
            ->select(
                'product.*',
                'categories.category_name'
            )
            ->get();

        foreach ($products as $product)
        {
            if (empty($product->producturl))
            {
                continue;
            }

            if (empty($product->category_name))
            {
                continue;
            }

            $categorySlug = strtolower(
                trim(
                    preg_replace(
                        '/[^A-Za-z0-9]+/',
                        '-',
                        $product->category_name
                    ),
                    '-'
                )
            );

            if (empty($categorySlug))
            {
                continue;
            }

            $loc = url(
                '/' . $categorySlug . '/' . $product->producturl
            );

            $lastmod = optional($product->updated_at)->toAtomString();
            $xml .= '<url>';
            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';
            $xml .= '</url>' . "\n";
        }

        // 4. ALL STATIC PAGES
        $staticRoutes = [
            // MAIN / IMPORTANT PAGES
            'case-studies',
            'contact-us',
            'custom-rotational-moulding',
            'fish-tab-uk',
            'insulated-ice-boxes',
            'plastic-pallets-supplier',
            'about-us',

            // OTHER STATIC PAGES
            'download',
            'gallary-videos',
            'productlist',
            'productfront',
            'distributor',
            'jointventure',
            'inquiryqoute',
        ];

        $highPriorityPages = [
            'case-studies',
            'contact-us',
            'custom-rotational-moulding',
            'fish-tab-uk',
            'insulated-ice-boxes',
            'plastic-pallets-supplier',
            'about-us',
            'productlist',
        ];

        foreach ($staticRoutes as $name)
        {
            $loc = route($name);
            $priority = in_array($name, $highPriorityPages)
                ? '0.80'
                : '0.60';

            $xml .= '<url>';
            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';
            $xml .= '<lastmod>'
                . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
                . '</lastmod>';
            $xml .= '<priority>'
                . $priority
                . '</priority>';
            $xml .= '</url>' . "\n";
        }

        // 5. BLOG LISTING PAGE
        $xml .= '<url>';
        $xml .= '<loc>'
            . htmlspecialchars(
                route('blog'),
                ENT_XML1,
                'UTF-8'
            )
            . '</loc>';

        $xml .= '<lastmod>'
            . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
            . '</lastmod>';

        $xml .= '<priority>0.80</priority>';
        $xml .= '</url>' . "\n";

        // 6. ALL BLOG DETAILS
        $blogs = blog::orderBy('id', 'asc')->get();
        foreach ($blogs as $blog)
        {
            if (empty($blog->id))
            {
                continue;
            }

            $loc = route('blogdetail', [
                'id' => $blog->id
            ]);

            $lastmod = optional($blog->updated_at)->toAtomString();
            $xml .= '<url>';
            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';
            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';
        return $this->xmlResponse($xml);
    }
}