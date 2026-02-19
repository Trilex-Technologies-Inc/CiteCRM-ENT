<?xml version="1.0" encoding="ISO-8859-1"?>

<!-- XSL Transformation Style Sheet                                        -->
<!-- Purpose  : Convert a WinAudit Freeware XML document to basic HTML     -->
<!-- Copyright: None claimed or implied, use/disribute/modify at your risk -->
<!-- Filename : wa_xml2html.xls                                            -->
<!-- Version  : 1.0                                                        -->
<!-- Date     : 05-May-2006                                                -->
<!-- Author   : Parmavex Services                                          -->
<!-- Feedback : Bug reports to _winaudit_ _at_ pxserver_ _dot_ _com_       -->
<!-- Notes    : Tab = 4 spaces                                             -->
<!-- Transform: ===================================================        --> 
<!--          : Content         | XML Tag      Attribute | HTML Tag        --> 
<!--          : ===================================================        --> 
<!--          : Main Title      | <title>                | <h2>            --> 
<!--          : Message         | <infomessage>          | <h3>            --> 
<!--            Categories      | <category>    @title   | <h3>            --> 
<!--            + Subcategories | <subcategory> @title   | <h4>            -->
<!--              + Tables      | <recordset>   @title   | <table>         -->
<!--                + Headings  | <fieldname>            | <th>            -->
<!--                  + Rows    | <datarow>              | <tr>            -->
<!--                    + Cells | <fieldvalue>           | <td>            -->
<!--            Disclaimer      | <disclaimer>           | -               -->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

    <html>
    <head>
    <meta name="generator" content="WinAudit Freeware"/>
    <meta name="author" content="Parmavex Services"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
    <center>
        <!-- Main Title -->
        <h2><xsl:value-of select="computeraudit/title"/></h2>

        <!-- Possible information message -->
	<hr><font color="#800000">
	<h3><xsl:value-of select="computeraudit/infomessage"/></h3>
	</font></hr>
        
        <!-- Cycle through categories -->
        <xsl:for-each select="computeraudit/category">

            <xsl:apply-templates select="category"/>

            <h3><u><xsl:value-of select="@title"/></u></h3>

            <!-- Cycle through sub-categories -->
            <xsl:for-each select="subcategory">

                <h4><u><xsl:value-of select="@title"/></u></h4>

                <!-- Cycle through recordsets a.k.a. tables -->
                <xsl:for-each select="recordset">

                    <h5><u><xsl:value-of select="@title"/></u></h5>
                    
                    <table border="0" cellspacing="2" cellpadding="2" width="600">

                    <!-- The Header Row -->
                    <tr bgcolor="#6699cc">                    
                    <xsl:for-each select="fieldname">
                        <th>
                        <xsl:apply-templates/>
                        </th>
                    </xsl:for-each>
                    </tr>

                    <!-- Data Rows a.k.a. records -->
                    <xsl:for-each select="datarow">

                        <tr>

                        <!-- Row high-lite -->
                        <xsl:if test="position() > 0 and position() mod 10 = 0">
                            <xsl:attribute name="bgcolor">#e5e5e5</xsl:attribute>
                        </xsl:if>
                    
                        <!-- Field Values a.k.a. cells 
                             Number per row must match Number of fieldnames in the header row 
                        -->
                        <xsl:for-each select="fieldvalue">
                            
                            <td><font size="2" face="verdana">

                            <xsl:apply-templates/>

                            </font></td>

                        </xsl:for-each> <!-- Loop cells -->

                        </tr>

                    </xsl:for-each> <!-- Loop rows -->

                    </table>

                    <hr width="600"/>

                </xsl:for-each> <!-- Loop tables -->

            </xsl:for-each> <!-- Loop subcategories -->

        </xsl:for-each> <!-- Loop categories -->

        <!-- Disclaimer -->
        <p>
        <font size="2" color="#808080">
        <xsl:value-of select="computeraudit/disclaimer"/>
        </font>
        </p>   

    </center>
    </body>
    </html>

</xsl:template>
</xsl:stylesheet>
<!-- EOF = End of File -->
