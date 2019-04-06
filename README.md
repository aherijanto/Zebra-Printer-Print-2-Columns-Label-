# Zebra-Printer-Print-2-Columns-Label-
ZPL II With PHP Script To Print Label 2 Columns On Zebra Printer

To solve issues printing 2 columns barcode label on Zebra Printer GK420t or some compatible devices with ZPL II.
The 'printbar.php' contains header ^XA and footer ^XZ ZPL II command, as you see on script, each row on label open by ^XA on column 1 and close by ^XZ on column 2.

The 'printzebra.php' contains script to direct print to Zebra using statement 'copy($files,[IP and [PrinterName]) you've shared on windows.
To do printer sharing, right-click on ZebraPrinter and choose properties then sharing.
If you use DHCP on your machine, let the IP address to 'localhost', if you use static IP let the IP address same as IP machine.
