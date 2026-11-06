#!/usr/bin/env python3
"""Generador del Excel Financiero de Ciare Group 2026"""

import os
from datetime import date
from openpyxl import Workbook
from openpyxl.styles import Font, PatternFill, Alignment, Border, Side
from openpyxl.utils import get_column_letter
from openpyxl.drawing.image import Image as XLImage
from openpyxl.chart import BarChart, PieChart, Reference
from openpyxl.formatting.rule import FormulaRule
from openpyxl.worksheet.datavalidation import DataValidation
from openpyxl.worksheet.table import Table, TableStyleInfo

# ── Constants ──────────────────────────────────────────────────────────────────
BLUE_DARK    = "1B3D7B"
BLUE_MID     = "2E5EAA"
BLUE_LIGHT   = "D6E4F0"
WHITE        = "FFFFFF"
GRAY_LIGHT   = "F5F7FA"
TEXT_DARK    = "2C3E50"
TEXT_GRAY    = "7F8C8D"
RED          = "E74C3C"
RED_LIGHT    = "FADBD8"
GREEN_DARK   = "1E8449"
GREEN_LIGHT  = "D5F5E3"
YELLOW       = "D4AC0D"
YELLOW_LIGHT = "FCF3CF"
ORANGE       = "E67E22"
ORANGE_LIGHT = "FDEBD0"

COP_FMT  = '#,##0'
PCT_FMT  = '0.0%'
DATE_FMT = 'DD/MM/YYYY'
TODAY    = date.today().strftime('%d/%m/%Y')
YEAR     = 2026
MONTHS   = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
CATS     = ['Infraestructura/Hosting', 'Marketing', 'Desarrollo', 'Administrativo', 'Otros']

BASE   = os.path.dirname(os.path.abspath(__file__))
LOGO   = os.path.join(BASE, 'assets', 'img', 'ciare-logo.png')
OUTPUT = os.path.join(BASE, 'Ciare_Group_Finanzas_2026.xlsx')


# ── Style helpers ──────────────────────────────────────────────────────────────
def F(color):
    return PatternFill("solid", fgColor=color)

def FN(bold=False, size=11, color=TEXT_DARK, name="Calibri"):
    return Font(bold=bold, size=size, color=color, name=name)

def BD(style="thin"):
    s = Side(style=style)
    return Border(left=s, right=s, top=s, bottom=s)

def AL(h="left", v="center", wrap=False, indent=0):
    return Alignment(horizontal=h, vertical=v, wrap_text=wrap, indent=indent)

def header_row(ws, row, values, bg=BLUE_DARK, fg=WHITE, height=28):
    ws.row_dimensions[row].height = height
    for i, val in enumerate(values, 1):
        c = ws.cell(row=row, column=i)
        c.value = val
        c.fill = F(bg)
        c.font = FN(bold=True, color=fg, size=10)
        c.alignment = AL(h="center")
        c.border = BD()

def sheet_title(ws, row, text, bg, n_cols=10, height=35):
    ws.merge_cells(start_row=row, start_column=1, end_row=row, end_column=n_cols)
    c = ws.cell(row=row, column=1)
    c.value = text
    c.fill = F(bg)
    c.font = FN(bold=True, size=14, color=WHITE)
    c.alignment = AL(h="center")
    ws.row_dimensions[row].height = height

def col_widths(ws, widths):
    for i, w in enumerate(widths, 1):
        ws.column_dimensions[get_column_letter(i)].width = w

def fr(formula, bg, fg, bold=False, size=10):
    """FormulaRule with fill+font (openpyxl 3.x API)."""
    return FormulaRule(formula=[formula], fill=F(bg), font=FN(bold=bold, color=fg, size=size))


# ── Sheet: Productos ───────────────────────────────────────────────────────────
def build_productos(wb):
    ws = wb.create_sheet("Productos")
    ws.sheet_view.showGridLines = False
    col_widths(ws, [6, 20, 42, 22, 22, 14, 20])

    sheet_title(ws, 1, "PRODUCTOS — CIARE GROUP", BLUE_DARK, n_cols=7)
    headers = ["ID", "Nombre", "Descripción", "Precio Mensual (COP)",
               "Precio Anual (COP)", "Estado", "Fecha Lanzamiento"]
    header_row(ws, 2, headers)

    data = [["PRD-001", "MALLOR",
             "Software contable y operativo para negocios colombianos",
             150000, 1500000, "Activo", date(2026, 10, 1)]]

    for ri, row_data in enumerate(data, 3):
        for ci, val in enumerate(row_data, 1):
            c = ws.cell(row=ri, column=ci, value=val)
            c.fill = F(GRAY_LIGHT if ri % 2 == 0 else WHITE)
            c.font = FN(size=10)
            c.alignment = AL(h="right" if ci in [4, 5] else "left")
            c.border = BD()
            if ci in [4, 5]:
                c.number_format = COP_FMT
            if ci == 7 and isinstance(val, date):
                c.number_format = DATE_FMT

    for ri in range(4, 14):
        for ci in range(1, 8):
            c = ws.cell(row=ri, column=ci)
            c.fill = F(GRAY_LIGHT if ri % 2 == 0 else WHITE)
            c.font = FN(size=10)
            c.border = BD()
            if ci in [4, 5]:
                c.number_format = COP_FMT
            if ci == 7:
                c.number_format = DATE_FMT

    tab = Table(displayName="Productos", ref="A2:G13")
    tab.tableStyleInfo = TableStyleInfo(name="TableStyleMedium9", showRowStripes=True)
    ws.add_table(tab)
    ws.freeze_panes = "A3"
    return ws


# ── Sheet: Clientes ────────────────────────────────────────────────────────────
def build_clientes(wb):
    ws = wb.create_sheet("Clientes")
    ws.sheet_view.showGridLines = False
    col_widths(ws, [10, 28, 15, 22, 28, 15, 18, 12, 16, 12, 22, 30])

    sheet_title(ws, 1, "CLIENTES — CIARE GROUP", BLUE_DARK, n_cols=12)
    headers = ["ID", "Empresa", "NIT", "Contacto", "Email", "Teléfono",
               "Producto", "Plan", "Fecha Inicio", "Estado", "Valor Mensual (COP)", "Notas"]
    header_row(ws, 2, headers)

    sample = ["CLI-001", "Empresa Demo S.A.S.", "900123456-7", "Juan Pérez",
              "juan@empresademo.co", "310 000 0000", "MALLOR", "Mensual",
              date(2026, 10, 1), "Activo", 150000, "Cliente inaugural Mallor"]
    for ci, val in enumerate(sample, 1):
        c = ws.cell(row=3, column=ci, value=val)
        c.fill = F(WHITE)
        c.font = FN(size=10)
        c.border = BD()
        c.alignment = AL(h="right" if ci == 11 else "left")
        if ci == 9 and isinstance(val, date):
            c.number_format = DATE_FMT
        if ci == 11:
            c.number_format = COP_FMT

    for ri in range(4, 52):
        for ci in range(1, 13):
            c = ws.cell(row=ri, column=ci)
            c.fill = F(GRAY_LIGHT if ri % 2 == 0 else WHITE)
            c.font = FN(size=10)
            c.border = BD()
            if ci == 9:
                c.number_format = DATE_FMT
            if ci == 11:
                c.number_format = COP_FMT

    ws.add_data_validation(DataValidation(type="list", formula1='"Mensual,Anual,Trial"',
                                          allow_blank=True, sqref="H3:H51"))
    ws.add_data_validation(DataValidation(type="list", formula1='"Activo,Inactivo,Trial"',
                                          allow_blank=True, sqref="J3:J51"))
    ws.add_data_validation(DataValidation(type="list", formula1="Productos!$B$3:$B$12",
                                          allow_blank=True, sqref="G3:G51"))

    # Totals strip
    for ci in range(1, 13):
        c = ws.cell(row=52, column=ci)
        c.fill = F(BLUE_LIGHT)
        c.font = FN(bold=True, size=10, color=BLUE_DARK)
        c.border = Border(top=Side(style="double"), bottom=Side(style="thin"),
                          left=Side(style="thin"), right=Side(style="thin"))
    ws.cell(row=52, column=1).value = "Total clientes activos:"
    ws.cell(row=52, column=11).value = '=COUNTIF(J3:J51,"Activo")'
    ws.cell(row=52, column=11).alignment = AL(h="center")
    ws.row_dimensions[52].height = 22

    tab = Table(displayName="Clientes", ref="A2:L51")
    tab.tableStyleInfo = TableStyleInfo(name="TableStyleMedium2", showRowStripes=True)
    ws.add_table(tab)
    ws.freeze_panes = "A3"
    return ws


# ── Sheet: Ingresos ────────────────────────────────────────────────────────────
def build_ingresos(wb):
    ws = wb.create_sheet("Ingresos")
    ws.sheet_view.showGridLines = False
    col_widths(ws, [14, 12, 28, 16, 30, 20, 20, 14, 8, 8])

    sheet_title(ws, 1, "REGISTRO DE INGRESOS — CIARE GROUP 2026", GREEN_DARK, n_cols=10)
    headers = ["Fecha", "ID Cliente", "Cliente", "Producto", "Concepto",
               "Valor (COP)", "Forma de Pago", "Estado", "Mes", "Año"]
    header_row(ws, 2, headers, bg=GREEN_DARK)

    sample = [date(2026, 10, 1), "CLI-001", "Empresa Demo S.A.S.", "MALLOR",
              "Suscripción mensual Octubre 2026", 150000,
              "Transferencia", "Pagado", "=MONTH(A3)", "=YEAR(A3)"]
    for ci, val in enumerate(sample, 1):
        c = ws.cell(row=3, column=ci, value=val)
        c.fill = F(WHITE)
        c.font = FN(size=10)
        c.border = BD()
        c.alignment = AL(h="right" if ci == 6 else ("center" if ci in [9, 10] else "left"))
        if ci == 1:
            c.number_format = DATE_FMT
        if ci == 6:
            c.number_format = COP_FMT

    for ri in range(4, 202):
        alt = ri % 2 == 0
        for ci in range(1, 11):
            c = ws.cell(row=ri, column=ci)
            c.fill = F(GRAY_LIGHT if alt else WHITE)
            c.font = FN(size=10)
            c.border = BD()
            if ci == 1:
                c.number_format = DATE_FMT
            elif ci == 6:
                c.number_format = COP_FMT
                c.alignment = AL(h="right")
            elif ci == 9:
                c.value = f'=IF(A{ri}="","",MONTH(A{ri}))'
                c.alignment = AL(h="center")
            elif ci == 10:
                c.value = f'=IF(A{ri}="","",YEAR(A{ri}))'
                c.alignment = AL(h="center")

    ws.add_data_validation(DataValidation(type="list",
        formula1='"Pagado,Pendiente,Cancelado"', allow_blank=True, sqref="H3:H201"))
    ws.add_data_validation(DataValidation(type="list",
        formula1='"Transferencia,PSE,Efectivo,Tarjeta"', allow_blank=True, sqref="G3:G201"))

    # Totals row
    for ci in range(1, 11):
        c = ws.cell(row=202, column=ci)
        c.fill = F(BLUE_LIGHT)
        c.font = FN(bold=True, size=10, color=BLUE_DARK)
        c.border = Border(top=Side(style="double"), bottom=Side(style="thin"),
                          left=Side(style="thin"), right=Side(style="thin"))
    ws.cell(row=202, column=1).value = "TOTAL INGRESOS"
    ws.cell(row=202, column=6).value = "=SUM(F3:F201)"
    ws.cell(row=202, column=6).number_format = COP_FMT
    ws.cell(row=202, column=6).alignment = AL(h="right")
    ws.row_dimensions[202].height = 22

    ws.conditional_formatting.add("H3:H201",
        FormulaRule(formula=['H3="Pagado"'], fill=F(GREEN_LIGHT), font=FN(color=GREEN_DARK)))
    ws.conditional_formatting.add("H3:H201",
        FormulaRule(formula=['H3="Pendiente"'], fill=F(YELLOW_LIGHT), font=FN(color=YELLOW)))
    ws.conditional_formatting.add("H3:H201",
        FormulaRule(formula=['H3="Cancelado"'], fill=F(RED_LIGHT), font=FN(color=RED)))

    tab = Table(displayName="Ingresos", ref="A2:J201")
    tab.tableStyleInfo = TableStyleInfo(name="TableStyleMedium7", showRowStripes=True)
    ws.add_table(tab)
    ws.freeze_panes = "A3"
    return ws


# ── Sheet: Gastos ──────────────────────────────────────────────────────────────
def build_gastos(wb):
    ws = wb.create_sheet("Gastos")
    ws.sheet_view.showGridLines = False
    col_widths(ws, [14, 26, 22, 35, 20, 22, 18, 16, 8, 8, 3, 3, 28, 20])

    sheet_title(ws, 1, "REGISTRO DE GASTOS — CIARE GROUP 2026", RED, n_cols=10)
    headers = ["Fecha", "Categoría", "Subcategoría", "Descripción", "Valor (COP)",
               "Proveedor", "Forma de Pago", "Comprobante #", "Mes", "Año"]
    header_row(ws, 2, headers, bg=RED)

    for ri in range(3, 202):
        alt = ri % 2 == 0
        for ci in range(1, 11):
            c = ws.cell(row=ri, column=ci)
            c.fill = F(GRAY_LIGHT if alt else WHITE)
            c.font = FN(size=10)
            c.border = BD()
            if ci == 1:
                c.number_format = DATE_FMT
            elif ci == 5:
                c.number_format = COP_FMT
                c.alignment = AL(h="right")
            elif ci == 9:
                c.value = f'=IF(A{ri}="","",MONTH(A{ri}))'
                c.alignment = AL(h="center")
            elif ci == 10:
                c.value = f'=IF(A{ri}="","",YEAR(A{ri}))'
                c.alignment = AL(h="center")

    cats_str = '","'.join(CATS)
    ws.add_data_validation(DataValidation(type="list",
        formula1=f'"{cats_str}"', allow_blank=True, sqref="B3:B201"))
    ws.add_data_validation(DataValidation(type="list",
        formula1='"Transferencia,PSE,Efectivo,Tarjeta,Débito"',
        allow_blank=True, sqref="G3:G201"))

    for ci in range(1, 11):
        c = ws.cell(row=202, column=ci)
        c.fill = F(BLUE_LIGHT)
        c.font = FN(bold=True, size=10, color=BLUE_DARK)
        c.border = Border(top=Side(style="double"), bottom=Side(style="thin"),
                          left=Side(style="thin"), right=Side(style="thin"))
    ws.cell(row=202, column=1).value = "TOTAL GASTOS"
    ws.cell(row=202, column=5).value = "=SUM(E3:E201)"
    ws.cell(row=202, column=5).number_format = COP_FMT
    ws.cell(row=202, column=5).alignment = AL(h="right")
    ws.row_dimensions[202].height = 22

    # Category summary table (cols M-N) used by pie chart
    ws.cell(row=2, column=13).value = "Categoría"
    ws.cell(row=2, column=14).value = "Total (COP)"
    for ci in [13, 14]:
        ws.cell(row=2, column=ci).fill = F(RED)
        ws.cell(row=2, column=ci).font = FN(bold=True, color=WHITE, size=10)
        ws.cell(row=2, column=ci).alignment = AL(h="center")
        ws.cell(row=2, column=ci).border = BD()

    for ri, cat in enumerate(CATS, 3):
        lc = ws.cell(row=ri, column=13, value=cat)
        lc.font = FN(size=10)
        lc.border = BD()
        lc.alignment = AL(h="left")
        lc.fill = F(GRAY_LIGHT if ri % 2 == 0 else WHITE)

        vc = ws.cell(row=ri, column=14)
        vc.value = f'=SUMIFS(E$3:E$201,B$3:B$201,M{ri},J$3:J$201,{YEAR})'
        vc.number_format = COP_FMT
        vc.alignment = AL(h="right")
        vc.border = BD()
        vc.font = FN(size=10)
        vc.fill = F(GRAY_LIGHT if ri % 2 == 0 else WHITE)

    tab = Table(displayName="Gastos", ref="A2:J201")
    tab.tableStyleInfo = TableStyleInfo(name="TableStyleMedium3", showRowStripes=True)
    ws.add_table(tab)
    ws.freeze_panes = "A3"
    return ws


# ── Sheet: P&L ─────────────────────────────────────────────────────────────────
def build_pnl(wb):
    ws = wb.create_sheet("P&L")
    ws.sheet_view.showGridLines = False
    ws.column_dimensions["A"].width = 24
    for i in range(2, 14):
        ws.column_dimensions[get_column_letter(i)].width = 13
    ws.column_dimensions["N"].width = 16

    sheet_title(ws, 1, f"ESTADO DE RESULTADOS — CIARE GROUP {YEAR}", BLUE_DARK, n_cols=14)

    # Row 2: month headers
    ws.row_dimensions[2].height = 28
    ws.cell(row=2, column=1, value="Concepto").fill = F(BLUE_DARK)
    ws.cell(row=2, column=1).font = FN(bold=True, color=WHITE, size=10)
    ws.cell(row=2, column=1).alignment = AL(h="center")
    ws.cell(row=2, column=1).border = BD()

    for i, m in enumerate(MONTHS, 2):
        c = ws.cell(row=2, column=i, value=m)
        c.fill = F(BLUE_MID)
        c.font = FN(bold=True, color=WHITE, size=10)
        c.alignment = AL(h="center")
        c.border = BD()

    ws.cell(row=2, column=14, value="TOTAL AÑO").fill = F(BLUE_DARK)
    ws.cell(row=2, column=14).font = FN(bold=True, color=WHITE, size=11)
    ws.cell(row=2, column=14).alignment = AL(h="center")
    ws.cell(row=2, column=14).border = BD()

    # Data rows
    rows = [
        (3,  "INGRESOS",       GREEN_DARK, WHITE,      "ing"),
        (4,  "GASTOS",         RED,        WHITE,      "gas"),
        (5,  "UTILIDAD BRUTA", BLUE_DARK,  WHITE,      "util"),
        (6,  "MARGEN (%)",     BLUE_MID,   WHITE,      "pct"),
        (7,  "RESULTADO",      GRAY_LIGHT, TEXT_DARK,  "res"),
    ]

    for row_num, label, bg, fg, kind in rows:
        ws.row_dimensions[row_num].height = 24
        a = ws.cell(row=row_num, column=1, value=label)
        a.fill = F(bg)
        a.font = FN(bold=True, size=10, color=fg)
        a.alignment = AL(h="left", indent=1)
        a.border = BD()

        for ci in range(2, 15):
            c = ws.cell(row=row_num, column=ci)
            m = ci - 1  # month number 1-12; ci=14 is total
            cl = get_column_letter(ci)
            pc = get_column_letter(ci - 1) if ci > 2 else "B"

            if kind == "ing":
                if ci <= 13:
                    c.value = (f"=SUMIFS(Ingresos!F$3:F$201,"
                               f"Ingresos!I$3:I$201,{m},"
                               f"Ingresos!J$3:J$201,{YEAR},"
                               f'Ingresos!H$3:H$201,"Pagado")')
                else:
                    c.value = "=SUM(B3:M3)"
                c.number_format = COP_FMT

            elif kind == "gas":
                if ci <= 13:
                    c.value = (f"=SUMIFS(Gastos!E$3:E$201,"
                               f"Gastos!I$3:I$201,{m},"
                               f"Gastos!J$3:J$201,{YEAR})")
                else:
                    c.value = "=SUM(B4:M4)"
                c.number_format = COP_FMT

            elif kind == "util":
                c.value = f"={cl}3-{cl}4"
                c.number_format = COP_FMT

            elif kind == "pct":
                c.value = f"=IF({cl}3=0,0,{cl}5/{cl}3)"
                c.number_format = PCT_FMT

            elif kind == "res":
                c.value = (f'=IF({cl}5>0,"✓ Positivo",'
                           f'IF({cl}5<0,"✗ Negativo","⚠ En cero"))')

            c.fill = F(bg)
            c.font = FN(bold=(kind in ["ing","gas","util"]), size=10, color=fg)
            c.alignment = AL(h="right" if kind in ["ing","gas","util"] else "center")
            c.border = BD()

    # Conditional formatting on Utilidad row
    ws.conditional_formatting.add("B5:N5",
        FormulaRule(formula=["B5<0"], fill=F(RED_LIGHT), font=FN(bold=True, color=RED)))
    ws.conditional_formatting.add("B5:N5",
        FormulaRule(formula=["B5>0"], fill=F(GREEN_LIGHT), font=FN(bold=True, color=GREEN_DARK)))

    # Conditional formatting on Resultado row
    ws.conditional_formatting.add("B7:N7",
        FormulaRule(formula=['B7="✓ Positivo"'],
                    fill=F(GREEN_LIGHT), font=FN(bold=True, color=GREEN_DARK)))
    ws.conditional_formatting.add("B7:N7",
        FormulaRule(formula=['B7="✗ Negativo"'],
                    fill=F(RED_LIGHT), font=FN(bold=True, color=RED)))
    ws.conditional_formatting.add("B7:N7",
        FormulaRule(formula=['B7="⚠ En cero"'],
                    fill=F(YELLOW_LIGHT), font=FN(bold=True, color=YELLOW)))

    ws.freeze_panes = "B3"
    return ws


# ── Sheet: Flujo de Caja ───────────────────────────────────────────────────────
def build_flujo(wb):
    ws = wb.create_sheet("Flujo de Caja")
    ws.sheet_view.showGridLines = False
    ws.column_dimensions["A"].width = 28
    for i in range(2, 14):
        ws.column_dimensions[get_column_letter(i)].width = 13
    ws.column_dimensions["N"].width = 16

    sheet_title(ws, 1, f"FLUJO DE CAJA — CIARE GROUP {YEAR}", BLUE_DARK, n_cols=14)

    ws.row_dimensions[2].height = 28
    ws.cell(row=2, column=1, value="Concepto").fill = F(BLUE_DARK)
    ws.cell(row=2, column=1).font = FN(bold=True, color=WHITE, size=10)
    ws.cell(row=2, column=1).alignment = AL(h="center")
    ws.cell(row=2, column=1).border = BD()

    for i, m in enumerate(MONTHS, 2):
        c = ws.cell(row=2, column=i, value=m)
        c.fill = F(BLUE_MID)
        c.font = FN(bold=True, color=WHITE, size=10)
        c.alignment = AL(h="center")
        c.border = BD()

    ws.cell(row=2, column=14, value="TOTAL").fill = F(BLUE_DARK)
    ws.cell(row=2, column=14).font = FN(bold=True, color=WHITE, size=11)
    ws.cell(row=2, column=14).alignment = AL(h="center")
    ws.cell(row=2, column=14).border = BD()

    rows = [
        (3, "Saldo Inicial",               GRAY_LIGHT, TEXT_DARK, "si"),
        (4, "Entradas (Ingresos Pagados)",  GREEN_LIGHT, GREEN_DARK, "ent"),
        (5, "Salidas (Gastos)",             RED_LIGHT,  RED,       "sal"),
        (6, "Saldo Final",                  BLUE_LIGHT, BLUE_DARK, "sf"),
    ]

    for row_num, label, bg, fg, kind in rows:
        ws.row_dimensions[row_num].height = 24
        a = ws.cell(row=row_num, column=1, value=label)
        a.fill = F(bg)
        a.font = FN(bold=True, size=10, color=fg)
        a.alignment = AL(h="left", indent=1)
        a.border = BD()

        for ci in range(2, 15):
            c = ws.cell(row=row_num, column=ci)
            cl = get_column_letter(ci)
            pl = get_column_letter(ci - 1)
            m = ci - 1

            if kind == "si":
                if ci == 2:
                    c.value = 0
                elif ci <= 13:
                    c.value = f"={pl}6"
                else:
                    c.value = "=B3"

            elif kind == "ent":
                if ci <= 13:
                    c.value = (f"=SUMIFS(Ingresos!F$3:F$201,"
                               f"Ingresos!I$3:I$201,{m},"
                               f"Ingresos!J$3:J$201,{YEAR},"
                               f'Ingresos!H$3:H$201,"Pagado")')
                else:
                    c.value = "=SUM(B4:M4)"

            elif kind == "sal":
                if ci <= 13:
                    c.value = (f"=SUMIFS(Gastos!E$3:E$201,"
                               f"Gastos!I$3:I$201,{m},"
                               f"Gastos!J$3:J$201,{YEAR})")
                else:
                    c.value = "=SUM(B5:M5)"

            elif kind == "sf":
                c.value = f"={cl}3+{cl}4-{cl}5" if ci <= 13 else "=N3+N4-N5"

            c.fill = F(bg)
            c.font = FN(bold=(kind == "sf"), size=10, color=fg)
            c.alignment = AL(h="right")
            c.border = BD()
            c.number_format = COP_FMT

    # Conditional on Saldo Final
    ws.conditional_formatting.add("B6:M6",
        FormulaRule(formula=["B6<0"], fill=F(RED_LIGHT), font=FN(bold=True, color=RED)))
    ws.conditional_formatting.add("B6:M6",
        FormulaRule(formula=["B6>0"], fill=F(GREEN_LIGHT), font=FN(bold=True, color=GREEN_DARK)))

    # Runway section
    ws.row_dimensions[7].height = 12
    ws.row_dimensions[8].height = 28
    ws.row_dimensions[9].height = 26
    ws.row_dimensions[10].height = 26
    ws.row_dimensions[11].height = 32

    ws.merge_cells("A8:E8")
    t = ws["A8"]
    t.value = "ANÁLISIS DE RUNWAY"
    t.fill = F(BLUE_DARK)
    t.font = FN(bold=True, size=12, color=WHITE)
    t.alignment = AL(h="center")
    t.border = BD()

    for label_row, label, formula, fmt in [
        (9,  "Promedio gasto mensual:",
             '=IFERROR(AVERAGEIF(B5:M5,">0"),0)', COP_FMT),
        (10, "Runway (meses de operación):",
             '=IFERROR(IF(B9=0,"Sin gastos",ROUND(M6/B9,1)),"N/A")', None),
    ]:
        ws.merge_cells(start_row=label_row, start_column=1,
                       end_row=label_row, end_column=4)
        lc = ws.cell(row=label_row, column=1, value=label)
        lc.fill = F(BLUE_LIGHT)
        lc.font = FN(bold=True, size=10, color=BLUE_DARK)
        lc.alignment = AL(h="left", indent=1)
        lc.border = BD()

        vc = ws.cell(row=label_row, column=5, value=formula)
        vc.fill = F(BLUE_LIGHT)
        vc.font = FN(bold=True, size=11, color=BLUE_DARK)
        vc.alignment = AL(h="center")
        vc.border = BD()
        if fmt:
            vc.number_format = fmt

    ws.merge_cells("A11:H11")
    alert = ws["A11"]
    alert.value = ('=IF(ISNUMBER(B10),IF(B10<3,'
                   '"⚠  ALERTA: Menos de 3 meses de runway — revisar gastos urgente",'
                   '"✓  OK: "&B10&" meses de runway disponibles"),'
                   '"✓  Sin gastos registrados aún")')
    alert.font = FN(bold=True, size=11)
    alert.alignment = AL(h="left", indent=1)
    alert.border = BD()

    ws.conditional_formatting.add("A11:H11",
        FormulaRule(formula=['LEFT(A11,2)="⚠"'],
                    fill=F(RED_LIGHT), font=FN(bold=True, size=11, color=RED)))
    ws.conditional_formatting.add("A11:H11",
        FormulaRule(formula=['LEFT(A11,2)="✓"'],
                    fill=F(GREEN_LIGHT), font=FN(bold=True, size=11, color=GREEN_DARK)))

    ws.freeze_panes = "B3"
    return ws


# ── Sheet: Dashboard (built last — charts reference P&L and Gastos) ────────────
def build_dashboard(wb):
    ws = wb.active
    ws.title = "Dashboard"
    ws.sheet_view.showGridLines = False

    ws.column_dimensions["A"].width = 3
    for col in ["B","C","D","E"]:
        ws.column_dimensions[col].width = 21
    ws.column_dimensions["F"].width = 3
    for col in ["G","H","I","J"]:
        ws.column_dimensions[col].width = 21
    ws.column_dimensions["K"].width = 3

    # Background
    for r in range(1, 65):
        for c_ in range(1, 12):
            ws.cell(row=r, column=c_).fill = F("EEF2FB")

    # ── Header: logo + title ──
    ws.row_dimensions[1].height = 10
    ws.row_dimensions[2].height = 75
    ws.row_dimensions[3].height = 20
    ws.row_dimensions[4].height = 15

    if os.path.exists(LOGO):
        img = XLImage(LOGO)
        img.height = 65
        img.width = 130
        ws.add_image(img, "B2")

    ws.merge_cells("D2:J2")
    t = ws["D2"]
    t.value = "CIARE GROUP — FINANZAS 2026"
    t.font = Font(name="Calibri", bold=True, size=24, color=BLUE_DARK)
    t.alignment = AL(h="left", v="center")
    t.fill = F("EEF2FB")

    ws.merge_cells("D3:J3")
    s = ws["D3"]
    s.value = f"Dashboard ejecutivo  ·  Actualización: {TODAY}"
    s.font = Font(name="Calibri", size=10, color=TEXT_GRAY)
    s.alignment = AL(h="left", v="center")
    s.fill = F("EEF2FB")

    # ── KPI cards (rows 5-7) ──
    ws.row_dimensions[5].height = 18
    ws.row_dimensions[6].height = 50
    ws.row_dimensions[7].height = 10
    ws.row_dimensions[8].height = 15

    kpis = [
        ("B","C", "INGRESOS YTD",   "=\"$ \"&TEXT('P&L'!N3,\"#,##0\")", "27AE60", GREEN_LIGHT),
        ("D","E", "GASTOS YTD",     "=\"$ \"&TEXT('P&L'!N4,\"#,##0\")", RED,      RED_LIGHT),
        ("G","H", "UTILIDAD NETA",  "=\"$ \"&TEXT('P&L'!N5,\"#,##0\")", BLUE_DARK, BLUE_LIGHT),
        ("I","J", "MARGEN (%)",     "=TEXT('P&L'!N6,\"0.0%\")",         ORANGE,   ORANGE_LIGHT),
    ]

    for c1, c2, lbl, formula, accent, card_bg in kpis:
        ws.merge_cells(f"{c1}5:{c2}5")
        lc = ws[f"{c1}5"]
        lc.value = lbl
        lc.font = FN(bold=True, size=9, color=accent)
        lc.fill = F(card_bg)
        lc.alignment = AL(h="center")
        lc.border = Border(left=Side(style="thin"), right=Side(style="thin"),
                           top=Side(style="thin"))

        ws.merge_cells(f"{c1}6:{c2}6")
        vc = ws[f"{c1}6"]
        vc.value = formula
        vc.font = Font(name="Calibri", bold=True, size=17, color=accent)
        vc.fill = F(card_bg)
        vc.alignment = AL(h="center")
        vc.border = Border(left=Side(style="thin"), right=Side(style="thin"))

        ws.merge_cells(f"{c1}7:{c2}7")
        bc = ws[f"{c1}7"]
        bc.fill = F(accent)
        bc.border = Border(left=Side(style="thin"), right=Side(style="thin"),
                           bottom=Side(style="thin"))

    # ── Semáforo (rows 9-11) ──
    ws.row_dimensions[9].height = 22
    ws.row_dimensions[10].height = 48
    ws.row_dimensions[11].height = 15

    ws.merge_cells("B9:E9")
    sh = ws["B9"]
    sh.value = "SALUD FINANCIERA"
    sh.fill = F(BLUE_DARK)
    sh.font = FN(bold=True, size=10, color=WHITE)
    sh.alignment = AL(h="center")
    sh.border = BD()

    ws.merge_cells("B10:E10")
    sv = ws["B10"]
    sv.value = ("=IF('P&L'!N5>=0,"
                "\"🟢  SALUDABLE — Empresa en números positivos\","
                "IF('P&L'!N5>=-0.2*'P&L'!N3,"
                "\"🟡  EN RIESGO — Margen negativo menor al 20%\","
                "\"🔴  EN NÚMEROS ROJOS — Pérdida crítica\"))")
    sv.font = Font(name="Calibri", bold=True, size=13, color=TEXT_DARK)
    sv.alignment = AL(h="center")
    sv.border = BD()

    # CF based on P&L value (more reliable than text parsing)
    ws.conditional_formatting.add("B10:E10",
        FormulaRule(formula=["'P&L'!N5>=0"],
                    fill=F(GREEN_LIGHT), font=FN(bold=True, size=13, color=GREEN_DARK)))
    ws.conditional_formatting.add("B10:E10",
        FormulaRule(formula=["AND('P&L'!N5<0,'P&L'!N5>=-0.2*'P&L'!N3)"],
                    fill=F(YELLOW_LIGHT), font=FN(bold=True, size=13, color=YELLOW)))
    ws.conditional_formatting.add("B10:E10",
        FormulaRule(formula=["'P&L'!N5<-0.2*'P&L'!N3"],
                    fill=F(RED_LIGHT), font=FN(bold=True, size=13, color=RED)))

    # ── Monthly summary table (rows 12-27) ──
    ws.row_dimensions[12].height = 14
    ws.row_dimensions[13].height = 26
    ws.row_dimensions[14].height = 28

    ws.merge_cells("B13:J13")
    mt = ws["B13"]
    mt.value = "RESUMEN MENSUAL"
    mt.fill = F(BLUE_DARK)
    mt.font = FN(bold=True, size=12, color=WHITE)
    mt.alignment = AL(h="left", indent=1)
    mt.border = BD()

    for ci, hdr in enumerate(["Mes","Ingresos (COP)","Gastos (COP)",
                               "Utilidad (COP)","Margen","Resultado"], 2):
        # Map to actual columns: B=2,C=3,D=4,E=5,G=7,H=8
        actual_col = [2, 3, 4, 5, 7, 8][ci - 2]
        c = ws.cell(row=14, column=actual_col, value=hdr)
        c.fill = F(BLUE_MID)
        c.font = FN(bold=True, color=WHITE, size=10)
        c.alignment = AL(h="center")
        c.border = BD()

    for i, month in enumerate(MONTHS):
        row = 15 + i
        ws.row_dimensions[row].height = 20
        pnl_col = get_column_letter(i + 2)
        alt = i % 2 == 0
        bg = GRAY_LIGHT if alt else WHITE

        cells = {
            2: (month,                  None,     "center", True),
            3: (f"='P&L'!{pnl_col}3",  COP_FMT,  "right",  False),
            4: (f"='P&L'!{pnl_col}4",  COP_FMT,  "right",  False),
            5: (f"='P&L'!{pnl_col}5",  COP_FMT,  "right",  False),
            7: (f"='P&L'!{pnl_col}6",  PCT_FMT,  "center", False),
            8: (f"='P&L'!{pnl_col}7",  None,     "center", False),
        }
        for col_idx, (val, fmt, align, bold) in cells.items():
            c = ws.cell(row=row, column=col_idx, value=val)
            c.fill = F(bg)
            c.font = FN(bold=bold, size=10, color=BLUE_DARK if bold else TEXT_DARK)
            c.alignment = AL(h=align)
            c.border = BD()
            if fmt:
                c.number_format = fmt

        # CF on Utilidad column (E)
        ws.conditional_formatting.add(f"E{row}",
            FormulaRule(formula=[f"E{row}<0"], fill=F(RED_LIGHT), font=FN(color=RED)))
        ws.conditional_formatting.add(f"E{row}",
            FormulaRule(formula=[f"E{row}>0"], fill=F(GREEN_LIGHT), font=FN(color=GREEN_DARK)))

    # ── Charts ──
    ws.row_dimensions[27].height = 14

    pnl_ws = wb["P&L"]
    gastos_ws = wb["Gastos"]

    # Bar chart: Ingresos vs Gastos
    bar = BarChart()
    bar.type = "col"
    bar.grouping = "clustered"
    bar.title = "Ingresos vs Gastos por Mes (COP)"
    bar.y_axis.title = "COP"
    bar.x_axis.title = "Mes"
    bar.style = 10
    bar.height = 13
    bar.width = 22

    ing_ref = Reference(pnl_ws, min_col=2, max_col=13, min_row=3, max_row=3)
    gas_ref = Reference(pnl_ws, min_col=2, max_col=13, min_row=4, max_row=4)
    cat_ref = Reference(pnl_ws, min_col=2, max_col=13, min_row=2, max_row=2)
    bar.add_data(ing_ref, titles_from_data=False)
    bar.add_data(gas_ref, titles_from_data=False)
    bar.set_categories(cat_ref)
    ws.add_chart(bar, "B28")

    # Pie chart: Gastos por categoría
    pie = PieChart()
    pie.title = "Distribución de Gastos por Categoría"
    pie.style = 10
    pie.height = 13
    pie.width = 18
    pie_data = Reference(gastos_ws, min_col=14, max_col=14, min_row=3, max_row=7)
    pie_cats = Reference(gastos_ws, min_col=13, max_col=13, min_row=3, max_row=7)
    pie.add_data(pie_data, titles_from_data=False)
    pie.set_categories(pie_cats)
    ws.add_chart(pie, "G28")

    return ws


# ── Main ───────────────────────────────────────────────────────────────────────
def main():
    wb = Workbook()

    # Build data sheets first so Dashboard charts can reference them
    build_productos(wb)
    build_clientes(wb)
    build_ingresos(wb)
    build_gastos(wb)
    build_pnl(wb)
    build_flujo(wb)

    # Dashboard uses wb.active (the auto-created first sheet)
    build_dashboard(wb)

    # Move Dashboard to first position
    wb.move_sheet("Dashboard", offset=-wb.sheetnames.index("Dashboard"))

    wb.save(OUTPUT)
    logo_ok = "incluido" if os.path.exists(LOGO) else "NO encontrado"
    print(f"[OK] Excel generado: {OUTPUT}")
    print(f"     Hojas: {wb.sheetnames}")
    print(f"     Logo:  {logo_ok}")


if __name__ == "__main__":
    main()
