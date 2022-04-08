<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Users</title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                    </tr>
                    <xsl:for-each select="Users/User">
                        <tr>
                            <td><xsl:value-of select="id" /></td>
                            <td><xsl:value-of select="firstName" /> <xsl:value-of select="lastName" /></td>
                            <td><xsl:value-of select="contactNo" /></td>
                            <td><xsl:value-of select="email" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
