    {if isset($subcategories)}
    {if (isset($display_subcategories) && $display_subcategories eq 1) || !isset($display_subcategories) }

    {*{$subcategories|@var_dump}*}
    <!-- Subcategories -->
    <div id="subcategories">
        <p class="subcategory-heading">{l s='Categorie'}</p>
        <ul class="clearfix">
            {foreach from=$subcategories item=subcategory}
            <li>
                <div class="subcategory-image">
                    <a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
                        {if $subcategory.id_image}
                        <img class="replace-2x" src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image, 'category_default')|escape:'html':'UTF-8'}" alt="{$subcategory.name|escape:'html':'UTF-8'}" />
                        {else}
                        <img class="replace-2x" src="{$img_cat_dir}{$lang_iso}-default-category_default.jpg" alt="{$subcategory.name|escape:'html':'UTF-8'}" />
                        {/if}
                    </a>
                </div>
                <h5><a class="subcategory-name" href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'}</a></h5>
            </li>
            {/foreach}
        </ul>
    </div>
    {/if}
    {/if}

{** Se non ci sono sottocategorie ripete le categorie superiori per facilitare lo switch

{if isset($category_switcher) && empty($subcategories)}
    <!-- Subcategories -->
    <div id="subcategories">
        <ul class="clearfix">
            {foreach from=$category_switcher item=category}
            <li>
                <div class="subcategory-image">
                    <a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}" title="{$category.name|escape:'html':'UTF-8'}" class="img">
                        {if $category.id_image}
                        <img class="replace-2x" src="{$link->getCatImageLink($category.link_rewrite, $category.id_image, 'category_default')|escape:'html':'UTF-8'}" alt="{$category.name|escape:'html':'UTF-8'}" />
                        {else}
                        <img class="replace-2x" src="{$img_cat_dir}{$lang_iso}-default-category_default.jpg" alt="{$category.name|escape:'html':'UTF-8'}" />
                        {/if}
                    </a>
                </div>
                <h5><a class="subcategory-name" href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}">{$category.name|truncate:25:'...'|escape:'html':'UTF-8'}</a></h5>
            </li>
            {/foreach}
        </ul>
    </div>
{/if}
*}
