<b>Work Order Cost</b>
                            <table class="small">
                                <tr>
                                    <td><b>Labor</b></td>
                                    <td>${$workorder_labor|string_format:"%.2f"}</td>
                                </tr><tr>
                                    <td><b>Parts</b></td>
                                    <td>${$workorder_parts|string_format:"%.2f"}</td>
                                </tr><tr>
                                    <td><b>Service</b></td>
                                    <td>${$workorder_service|string_format:"%.2f"}</td>
                                </tr><tr>
                                    <td><b>Total</b></td>
                                    <td><b>${$workorder_total|string_format:"%.2f"}</b></td>
                                </tr>
                            </table>