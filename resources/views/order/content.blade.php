<?xml version="2.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="2.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
<h2>Complaints</h2>
<table border="1">
<tr bgcolor="#9acd32">
  <th>Parcel</th>
  <th>Price</th>
  <th>Description</th>
</tr>
<xsl:for-each select="menu/item">
<tr>
  <td>
  <xsl:value-of select="field[@name='parcel']" />
  </td>
  <td>
  <xsl:value-of select="field[@name='price']" />
  </td>
  <td>
  <xsl:value-of select="field[@name='description']" />
  </td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>