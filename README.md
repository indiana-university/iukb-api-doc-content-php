# iukb-doc-content
A class to make presenting knowledge base content easier

## Requirements
* avitacco/iukb-php-api

## Usage
Usage is pretty simple, you simply call the create method statically on the
factory class.

### Basics
```php
use Edu\Iu\Uits\KnowledgeBase\Document\ContentFactory;

$doc = $kb->getDocument('amyk');
$content = ContentFactory::create($doc->getContent());
echo $content->getBody();
```

### Links
The links the KB returns may not be valid for your uses. To alter them a
a function is provided to 'rebase' them. This will let you change the part
before the four character document id.

```php
use Edu\Iu\Uits\KnowledgeBase\Document\ContentFactory;

$doc = $kb->getDocument('amyk');
$content = ContentFactory::create($doc->getContent());

// If the hrefs are simply the doc id but need to be /help/docid
$content->rebaseKbLinks('', '/help/');

// If the links are full urls to the KB but need to be /help/docid
$content->rebaseKbLinks('https://kb.iu.edu/d/', '/help/');
```

### Rivet Styles
Currently the KB uses a custom bootstrap theme and so the class names follow
the bootstrap names. This is incompatible with Rivet. If you wish to display
documents using the rivet styles you can simply use the `rivetize()` function.

This function is based on the Indiana University official "rivetizer" 
javascript library. For more information about the rivetizer, visit
[https://github.com/indiana-university/rivetizer](https://github.com/indiana-university/rivetizer).

```php
use Edu\Iu\Uits\KnowledgeBase\Document\ContentFactory;

$doc = $kb->getDocument('amyk');
$content = ContentFactory::create($doc->getContent());
$content->rivetize();
```

## Contributing
Contributions are welcome in the form of a github pull request. Note, for
consistency sake, please run `composer check` and `composer run-tests` on any code
you wish to contribute to this project and fix and resolve any issues found
