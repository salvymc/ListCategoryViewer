# Prestashop 1.7 ListCategoryViewer

[IT] Il modulo aggiunge le sottocategorie alla pagina delle categorie in PrestaShop 1.7
[ENG] The module adds the subcategories to the category page in PrestaShop 1.7

![Cattura](https://user-images.githubusercontent.com/10051897/194675551-626f7c0d-0719-41c4-873a-8270d4a743c1.PNG)


Per il corretto funzionamento del modulo aggiungi il seguente hook personalizzato nel file category.tpl del tuo tema

PERCORSO:

```
100. {root}
     - themes
       - {theme_dir}
         - templates
           - catalog
             - listing
               - category.tpl
```           
CODICE DA INSERIRE:

```
{hook h="displayPrestaCategorySwitcher" category=$category}
```
ESEMPIO (category.tpl)

![Cattura](https://user-images.githubusercontent.com/10051897/194676456-dae1883a-9ca3-4de3-a8a8-941086478ace.PNG)
