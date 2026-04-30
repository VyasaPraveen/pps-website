"use client";

import { useMemo, useState } from "react";
import { ArrowRightIcon } from "./Icons";
import Link from "next/link";

const UNIT_RATE = 8.5;
const UNITS_PER_KW_PER_DAY = 4;
const COST_PER_KW = 65000;
const SUBSIDY_TABLE: Record<number, number> = { 1: 30000, 2: 60000, 3: 78000 };
const MAX_SUBSIDY = 78000;
const SQ_FT_PER_KW = 80;

function estimateKw(monthlyBill: number): number {
  if (monthlyBill <= 0) return 1;
  const desiredUnits = monthlyBill / UNIT_RATE;
  const kw = desiredUnits / (UNITS_PER_KW_PER_DAY * 30);
  return Math.max(1, Math.min(20, Math.round(kw)));
}

function getSubsidy(kw: number): number {
  if (kw >= 3) return MAX_SUBSIDY;
  return SUBSIDY_TABLE[kw] ?? 0;
}

function formatRupees(value: number): string {
  return new Intl.NumberFormat("en-IN", {
    style: "currency",
    currency: "INR",
    maximumFractionDigits: 0,
  }).format(value);
}

export function SavingsCalculator() {
  const [bill, setBill] = useState(2500);

  const result = useMemo(() => {
    const kw = estimateKw(bill);
    const grossCost = kw * COST_PER_KW;
    const subsidy = getSubsidy(kw);
    const netCost = grossCost - subsidy;
    const monthlyUnits = kw * UNITS_PER_KW_PER_DAY * 30;
    const monthlySaving = Math.min(bill, monthlyUnits * UNIT_RATE);
    const annualSaving = monthlySaving * 12;
    const paybackYears = annualSaving > 0 ? netCost / annualSaving : 0;
    const spaceSqFt = kw * SQ_FT_PER_KW;
    return {
      kw,
      grossCost,
      subsidy,
      netCost,
      monthlySaving,
      annualSaving,
      paybackYears,
      spaceSqFt,
    };
  }, [bill]);

  return (
    <div className="grid gap-6 md:grid-cols-2">
      <div className="rounded-3xl bg-white p-7 border border-solar-100 shadow-md">
        <h3 className="text-xl font-bold text-sky-deep">Estimate Your Savings</h3>
        <p className="mt-1 text-sm text-slate-600">
          Drag the slider to your average monthly electricity bill.
        </p>

        <div className="mt-6">
          <label htmlFor="bill" className="text-sm font-semibold text-slate-700">
            Monthly Electricity Bill
          </label>
          <div className="mt-2 flex items-baseline justify-between">
            <p className="text-3xl font-bold text-solar-600">{formatRupees(bill)}</p>
            <span className="text-xs text-slate-500">{result.kw} kW system</span>
          </div>
          <input
            id="bill"
            type="range"
            min={1000}
            max={20000}
            step={500}
            value={bill}
            onChange={(e) => setBill(Number(e.target.value))}
            className="mt-3 w-full h-2 rounded-full bg-solar-100 appearance-none cursor-pointer accent-solar-500"
            aria-label="Monthly electricity bill"
          />
          <div className="mt-2 flex justify-between text-xs text-slate-500">
            <span>₹1,000</span>
            <span>₹20,000</span>
          </div>
        </div>

        <div className="mt-6 grid grid-cols-2 gap-3 text-sm">
          <div className="rounded-xl bg-solar-50 p-3">
            <p className="text-xs text-slate-500">Plant Size</p>
            <p className="font-bold text-solar-700">{result.kw} kW</p>
          </div>
          <div className="rounded-xl bg-solar-50 p-3">
            <p className="text-xs text-slate-500">Roof Required</p>
            <p className="font-bold text-solar-700">{result.spaceSqFt} sq ft</p>
          </div>
        </div>
      </div>

      <div className="rounded-3xl sun-gradient p-7 text-white shadow-xl">
        <h3 className="text-xl font-bold">Your Estimated Returns</h3>
        <p className="text-sm text-white/80 mt-1">
          Based on Tirupati irradiance and ₹{UNIT_RATE}/unit average tariff.
        </p>

        <div className="mt-6 space-y-4">
          <div className="rounded-xl bg-white/15 backdrop-blur p-4">
            <p className="text-xs uppercase tracking-wider text-white/80">Annual Savings</p>
            <p className="text-3xl font-bold mt-1">{formatRupees(result.annualSaving)}</p>
          </div>

          <div className="grid grid-cols-2 gap-3">
            <div className="rounded-xl bg-white/15 backdrop-blur p-3">
              <p className="text-xs uppercase tracking-wider text-white/80">Monthly Save</p>
              <p className="text-lg font-bold mt-1">{formatRupees(result.monthlySaving)}</p>
            </div>
            <div className="rounded-xl bg-white/15 backdrop-blur p-3">
              <p className="text-xs uppercase tracking-wider text-white/80">Subsidy</p>
              <p className="text-lg font-bold mt-1">{formatRupees(result.subsidy)}</p>
            </div>
          </div>

          <div className="grid grid-cols-2 gap-3">
            <div className="rounded-xl bg-white/15 backdrop-blur p-3">
              <p className="text-xs uppercase tracking-wider text-white/80">Net Cost</p>
              <p className="text-lg font-bold mt-1">{formatRupees(result.netCost)}</p>
            </div>
            <div className="rounded-xl bg-white/15 backdrop-blur p-3">
              <p className="text-xs uppercase tracking-wider text-white/80">Payback</p>
              <p className="text-lg font-bold mt-1">
                {result.paybackYears.toFixed(1)} yrs
              </p>
            </div>
          </div>
        </div>

        <Link
          href="/contact"
          className="mt-6 inline-flex items-center justify-center w-full gap-2 rounded-full bg-white text-solar-700 px-6 py-3 font-semibold hover:scale-[1.02] transition-transform"
        >
          Get a Detailed Quote
          <ArrowRightIcon size={18} />
        </Link>
        <p className="mt-3 text-xs text-white/70 text-center">
          Estimates only. Actual figures depend on site conditions and DISCOM tariff.
        </p>
      </div>
    </div>
  );
}
