# LJ Color Picker plugin for Craft CMS 3.x

A simple color picker for Craft CMS based on the [jQuery Spectrum plugin](https://github.com/bgrins/spectrum).

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

You can install the plugin via the Craft Plugin Store.

## Overview

This plugin adds the following fieldtype:

- LJ Color Picker

## Screenshot

![Screenshot](resources/img/9.png)

## Quick start

The default behaviour is to display a mini-picker that shows the currently selected color. For example:

![Screenshot](resources/img/7.png)

Clicking on the mini-picker shows the full interface. You can embed the full interface directly into the page with `flat: true`.

## Examples

Copy one of the following examples into the Parameters field above.

### Simple example

![Screenshot](resources/img/1.png)

```
allowEmpty: true,
preferredFormat: "hex",
showButtons: false
```

### Show input

![Screenshot](resources/img/2.png)

```
allowEmpty: true,
preferredFormat: "hex",
showButtons: false,
showInput: true
```

### Show alpha

![Screenshot](resources/img/3.png)

```
allowEmpty: true,
preferredFormat: "rgb",
showButtons: false,
showInput: true,
showAlpha: true
```

### Show palette

![Screenshot](resources/img/4.png)

```
allowEmpty: true,
showButtons: false,
showPalette: true,
palette: [
    ['black', 'white', 'blanchedalmond'],
    ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
]
```

### Show palette only

![Screenshot](resources/img/5.png)

```
showPaletteOnly: true,
showPalette:true,
palette: [
    ['black', 'white', 'blanchedalmond',
    'rgb(255, 128, 0);', 'hsv 100 70 50'],
    ['red', 'yellow', 'green', 'blue', 'violet']
]
```

### Twig logic

![Screenshot](resources/img/8.png)

```
{% set colors = ['black', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'] %}
{% set palette %}
	[
	{% for row in colors|batch(2) %}
		{{ loop.index > 1 ? ',' }}
	    [
        {% for color in row %}
        	{{ loop.index > 1 ? ',' }}
            '{{ color }}'
        {% endfor %}
	    ]
	{% endfor %}
	]
{% endset %}

showPaletteOnly: true,
showPalette:true,
palette: {{ palette }}
```

### Params in an external file

(relative to /templates folder)

```
{% include '_colorPickerParams.json' ignore missing %}
```

### More examples

See the original [jQuery Spectrum plugin](https://github.com/bgrins/spectrum) for more examples.

---

This plugin is based on the [jQuery Spectrum plugin](https://github.com/bgrins/spectrum) plugin [[MIT licence](https://github.com/bgrins/spectrum/blob/master/LICENSE)], with thanks to the original developer.

Brought to you by [Lewis Jenkins](https://lj.io).