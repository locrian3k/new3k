# 3K Coding Primer

This directory should contain the 3K Coding Primer created by Adalius.

## Migration Instructions

The primer is currently hosted at: https://wemudtogether.com/3KCodePrimer/

To migrate the content to this location:

1. **Option A: Copy the Sphinx-generated HTML**
   - Download all files from the wemudtogether.com/3KCodePrimer/ directory
   - Place them in this `/resources/primer/` folder
   - The index.html file should be at `/resources/primer/index.html`
   - All relative links should continue to work

2. **Option B: Rebuild from Sphinx source**
   - If you have access to the original Sphinx source files (RST files)
   - You can customize the theme to match the 3K website styling
   - Build with: `sphinx-build -b html source/ build/`
   - Copy the build output to this directory

## Content Overview

The primer covers:
- LPC fundamentals and code notation
- Data types (Int, Status, Float, String, Object, Array, Mapping, etc.)
- Variables and scope
- Operators
- Mappings and Functions
- Control structures
- Modifiers and Preprocessor directives
- Inheritance
- Driver functions reference
- Practical examples (rooms, objects, weapons, armor, monsters)
- Advanced topics (command hooks, heartbeats, callouts, closures)

## Author

Created by Adalius, 2025.
