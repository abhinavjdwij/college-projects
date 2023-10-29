VERSION 5.00
Begin VB.Form frmAlw 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Employee Allowances"
   ClientHeight    =   4335
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   8880
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   4335
   ScaleWidth      =   8880
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   4620
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   9000
      Begin VB.TextBox paidleave 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   5160
         TabIndex        =   11
         Top             =   3000
         Width           =   3135
      End
      Begin VB.CommandButton update 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Update"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   2880
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   9
         Top             =   3600
         Width           =   2295
      End
      Begin VB.TextBox hra 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   5160
         TabIndex        =   8
         Top             =   1800
         Width           =   3135
      End
      Begin VB.TextBox ta 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   5160
         TabIndex        =   6
         Top             =   2400
         Width           =   3135
      End
      Begin VB.TextBox empID 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   5160
         TabIndex        =   2
         Top             =   600
         Width           =   3135
      End
      Begin VB.TextBox da 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   5160
         TabIndex        =   1
         Top             =   1200
         Width           =   3135
      End
      Begin VB.Label pllabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Paid Leave"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   10
         Top             =   3000
         Width           =   3495
      End
      Begin VB.Label talabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Travelling Allowance"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   7
         Top             =   2400
         Width           =   3015
      End
      Begin VB.Label empIDlabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Employee ID"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   5
         Top             =   600
         Width           =   1815
      End
      Begin VB.Label hralabel 
         BackStyle       =   0  'Transparent
         Caption         =   "House Rent Allowance"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   4
         Top             =   1800
         Width           =   3495
      End
      Begin VB.Label dalabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Dearness Allowance"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   3
         Top             =   1200
         Width           =   3015
      End
   End
End
Attribute VB_Name = "frmAlw"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim errreply As String

Private Sub Form_Load()
    da.Enabled = False
    hra.Enabled = False
    ta.Enabled = False
    paidleave.Enabled = False
    update.Enabled = False
End Sub

Private Sub empID_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        errreply = "SELECT * FROM paytable WHERE empID LIKE '" & empID.Text & "'"
        rsPay.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsPay.EOF = True Then
            errreply = MsgBox("Invalid Employee ID", vbExclamation + vbOKOnly, "Error")
            empID.SetFocus
        Else
            empID.Enabled = False
            da.Text = rsPay!da
            hra.Text = rsPay!hra
            ta.Text = rsPay!ta
            paidleave.Text = rsPay!paidleave
            ' Enable all other inputs now
            da.Enabled = True
            hra.Enabled = True
            ta.Enabled = True
            paidleave.Enabled = True
            update.Enabled = True
        End If
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
    End If
End Sub

Private Sub update_Click()
    If da.Text = "" Or (Not (IsNumeric(da.Text))) Or Val(da.Text) < 0 Or Val(da.Text) > 100 Then
        errreply = MsgBox("Please Enter DA value between 0 to 100", vbCritical + vbOKOnly, "Error")
        da.SetFocus
    ElseIf hra.Text = "" Or (Not (IsNumeric(hra.Text))) Or Val(hra.Text) < 0 Or Val(hra.Text) > 100 Then
        errreply = MsgBox("Please Enter HRA value between 0 to 100", vbCritical + vbOKOnly, "Error")
        hra.SetFocus
    ElseIf ta.Text = "" Or (Not (IsNumeric(ta.Text))) Or Val(ta.Text) < 0 Or Val(ta.Text) > 100 Then
        errreply = MsgBox("Please Enter TA value between 0 to 100", vbCritical + vbOKOnly, "Error")
        ta.SetFocus
    ElseIf paidleave.Text = "" Or (Not (IsNumeric(paidleave.Text))) Or Val(paidleave.Text) < 0 Or Val(paidleave.Text) > 15 Then
        errreply = MsgBox("Please Enter Paid Leave value between 0 to 15", vbCritical + vbOKOnly, "Error")
        paidleave.SetFocus
    Else
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET da = '" & da.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET ta = '" & ta.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET hra = '" & hra.Text & "' WHERE empID = '" & empID.Text & "'")
        Set rsPay = Nothing
        Set rsPay = New ADODB.Recordset
        Set rsPay = con.Execute("UPDATE paytable SET paidleave = '" & paidleave.Text & "' WHERE empID = '" & empID.Text & "'")
        errreply = MsgBox("Employee Information Updated", vbInformation + vbOKOnly, "Finished")
        Unload Me
    End If
    Set rsPay = Nothing
    Set rsPay = New ADODB.Recordset
End Sub
