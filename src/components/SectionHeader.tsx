type Props = {
  eyebrow?: string;
  title: string;
  description?: string;
  align?: "left" | "center";
};

export function SectionHeader({
  eyebrow,
  title,
  description,
  align = "center",
}: Props) {
  const alignClass = align === "center" ? "text-center mx-auto" : "text-left";
  return (
    <div className={`max-w-3xl ${alignClass}`}>
      {eyebrow && (
        <span className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-solar-100 text-solar-700 text-xs font-semibold uppercase tracking-wider">
          <span className="h-1.5 w-1.5 rounded-full bg-solar-500" />
          {eyebrow}
        </span>
      )}
      <h2 className="mt-4 text-3xl md:text-4xl lg:text-5xl font-bold text-sky-deep tracking-tight">
        {title}
      </h2>
      {description && (
        <p className="mt-4 text-base md:text-lg text-slate-600 leading-relaxed">
          {description}
        </p>
      )}
    </div>
  );
}
